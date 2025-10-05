<?php

namespace App\Imports;

use App\Models\Service;
use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\UploadedFile;

class ServicesImport
{
    public function import($file)
    {
        // Определяем путь к файлу
        $filePath = is_string($file) ? $file : $file->getPathname();
        
        \Log::info('File path:', ['path' => $filePath, 'type' => gettype($file)]);
        
        // Если это строка, это может быть путь в storage
        if (is_string($file)) {
            // Убираем префикс "imports/" если он есть
            $cleanPath = str_replace('imports/', '', $file);
            $filePath = storage_path('app/public/imports/' . $cleanPath);
        }
        
        // Проверяем существование файла
        if (!file_exists($filePath)) {
            // Попробуем найти файл в других возможных местах
            $possiblePaths = [
                storage_path('app/public/imports/' . $file),
                storage_path('app/public/imports/' . str_replace('imports/', '', $file)),
                storage_path('app/' . $file),
                storage_path('app/public/' . $file),
                public_path('storage/' . $file),
                $file
            ];
            
            foreach ($possiblePaths as $path) {
                if (file_exists($path)) {
                    $filePath = $path;
                    break;
                }
            }
            
            if (!file_exists($filePath)) {
                throw new \Exception("Файл не найден. Проверенные пути: " . implode(', ', $possiblePaths));
            }
        }
        
        // Определяем кодировку файла
        $content = file_get_contents($filePath);
        \Log::info('File content length:', ['length' => strlen($content)]);
        
        $encoding = mb_detect_encoding($content, ['UTF-8', 'Windows-1251', 'CP1251', 'ISO-8859-1'], true);
        
        \Log::info('Detected encoding:', ['encoding' => $encoding]);
        
        if ($encoding && $encoding !== 'UTF-8') {
            $content = mb_convert_encoding($content, 'UTF-8', $encoding);
            \Log::info('Converted encoding to UTF-8');
        }
        
        $handle = tmpfile();
        fwrite($handle, $content);
        rewind($handle);
        
        // Определяем разделитель
        $firstLine = fgets($handle);
        rewind($handle);
        
        // Проверяем, какой разделитель используется
        $delimiter = strpos($firstLine, ';') !== false ? ';' : ',';
        
        $headers = fgetcsv($handle, 0, $delimiter); // Читаем заголовки с правильным разделителем
        
        // Нормализуем заголовки
        $normalizedHeaders = [];
        foreach ($headers as $header) {
            $normalizedHeader = trim(str_replace("\xEF\xBB\xBF", '', $header)); // Убираем BOM
            $normalizedHeaders[] = $normalizedHeader;
        }
        $headers = $normalizedHeaders;
        
        \Log::info('CSV Headers:', $headers);
        
        $imported = 0;
        $errors = [];
        
        while (($data = fgetcsv($handle, 0, $delimiter)) !== false) {
            try {
                // Пропускаем пустые строки
                if (empty(array_filter($data))) {
                    continue;
                }
                
                \Log::info('Processing row:', $data);
                
                // Если данных меньше чем заголовков, дополняем пустыми строками
                while (count($data) < count($headers)) {
                    $data[] = '';
                }
                
                // Если данных больше чем заголовков, обрезаем
                if (count($data) > count($headers)) {
                    $data = array_slice($data, 0, count($headers));
                }
                
                $this->importService($data, $headers);
                $imported++;
                \Log::info("Successfully imported row {$imported}");
            } catch (\Exception $e) {
                $errorMsg = "Ошибка в строке " . ($imported + 2) . ": " . $e->getMessage();
                $errors[] = $errorMsg;
                \Log::error($errorMsg, ['data' => $data, 'headers' => $headers]);
            }
        }
        
        fclose($handle);
        
        return [
            'imported' => $imported,
            'errors' => $errors
        ];
    }
    
    private function importService($data, $headers)
    {
        // Проверяем, что количество заголовков совпадает с количеством данных
        if (count($headers) !== count($data)) {
            throw new \Exception("Количество колонок не совпадает: заголовков " . count($headers) . ", данных " . count($data) . ". Данные: " . implode(', ', $data));
        }
        
        // Создаем массив из данных
        $row = array_combine($headers, $data);
        
        // Отладочная информация
        \Log::info('Importing row:', $row);
        
        // Создаем или находим категорию
        $category = null;
        $categoryName = $this->getValue($row, ['Категорії', 'Категории', 'Category', 'category']);
        if ($categoryName) {
            $category = Category::firstOrCreate(
                ['name' => trim($categoryName)],
                ['href' => $this->generateHref($categoryName)]
            );
            
            if ($category->wasRecentlyCreated) {
                \Log::info("Создана новая категория: {$categoryName}");
            } else {
                \Log::info("Найдена существующая категория: {$categoryName}");
            }
        }
        
        // Создаем или находим группу
        $group = null;
        $groupName = $this->getValue($row, ['Групи', 'Группы', 'Group', 'group']);
        if ($groupName) {
            $group = Group::firstOrCreate(
                ['name' => trim($groupName)],
                ['href' => $this->generateHref($groupName)]
            );
            
            if ($group->wasRecentlyCreated) {
                \Log::info("Создана новая группа: {$groupName}");
            } else {
                \Log::info("Найдена существующая группа: {$groupName}");
            }
        }
        
        // Создаем услугу
        $serviceName = $this->getValue($row, ['Назва', 'Название', 'Name', 'name']);
        if (!$serviceName) {
            throw new \Exception('Назва услуги обязательна');
        }
        
        $service = Service::create([
            'name' => $serviceName,
            'price' => $this->parsePrice($this->getValue($row, ['Ціна', 'Цена', 'Price', 'price'])),
            'title' => $this->getValue($row, ['Заголовок', 'Заголовок', 'Title', 'title']) ?? $serviceName,
            'value' => $this->getValue($row, ['Значення', 'Значение', 'Value', 'value']),
            'href' => $this->generateHref($serviceName),
        ]);
        
        // Привязываем категорию
        if ($category) {
            $service->categories()->attach($category->id);
        }
        
        // Привязываем группу
        if ($group) {
            $service->groups()->attach($group->id);
        }
        
        return $service;
    }
    
    private function getValue($row, $possibleKeys)
    {
        foreach ($possibleKeys as $key) {
            if (isset($row[$key]) && !empty(trim($row[$key]))) {
                return $row[$key];
            }
        }
        return null;
    }
    
    private function parsePrice($priceString)
    {
        // Если цена пустая, возвращаем 0
        if (empty($priceString)) {
            \Log::info('Price parsing: empty price string');
            return 0;
        }
        
        // Убираем лишние пробелы
        $priceString = trim($priceString);
        \Log::info('Price parsing:', ['original' => $priceString]);
        
        // Если цена содержит "Від" или "От", извлекаем число после него
        if (preg_match('/(?:Від|От|From|від|от|from)\s*(\d+(?:[.,]\d+)?)/i', $priceString, $matches)) {
            $price = str_replace(',', '.', $matches[1]);
            \Log::info('Price parsing: found "Від" pattern', ['matches' => $matches, 'result' => (float) $price]);
            return (float) $price;
        }
        
        // Если цена содержит "до" или "до", извлекаем число после него
        if (preg_match('/(?:до|до|up to|до)\s*(\d+(?:[.,]\d+)?)/i', $priceString, $matches)) {
            $price = str_replace(',', '.', $matches[1]);
            \Log::info('Price parsing: found "до" pattern', ['matches' => $matches, 'result' => (float) $price]);
            return (float) $price;
        }
        
        // Если цена содержит "ціна від" или "цена от", извлекаем число после него
        if (preg_match('/(?:ціна від|цена от|price from|ціна від|цена от)\s*(\d+(?:[.,]\d+)?)/i', $priceString, $matches)) {
            $price = str_replace(',', '.', $matches[1]);
            \Log::info('Price parsing: found "ціна від" pattern', ['matches' => $matches, 'result' => (float) $price]);
            return (float) $price;
        }
        
        // Если цена содержит "від" в начале строки, извлекаем число после него
        if (preg_match('/^від\s*(\d+(?:[.,]\d+)?)/i', $priceString, $matches)) {
            $price = str_replace(',', '.', $matches[1]);
            \Log::info('Price parsing: found "від" at start pattern', ['matches' => $matches, 'result' => (float) $price]);
            return (float) $price;
        }
        
        // Если цена содержит только число (с точкой или запятой)
        if (preg_match('/(\d+(?:[.,]\d+)?)/', $priceString, $matches)) {
            $price = str_replace(',', '.', $matches[1]);
            \Log::info('Price parsing: found number pattern', ['matches' => $matches, 'result' => (float) $price]);
            return (float) $price;
        }
        
        // Если ничего не найдено, возвращаем 0
        \Log::info('Price parsing: no pattern matched, returning 0');
        return 0;
    }
    
    private function generateHref($text)
    {
        $text = mb_strtolower($text);
        $text = str_replace(
            ['а','б','в','г','ґ','д','е','є','ж','з','и','і','ї','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ь','ю','я'],
            ['a','b','v','g','g','d','e','ye','zh','z','y','i','yi','y','k','l','m','n','o','p','r','s','t','u','f','kh','ts','ch','sh','shch','','yu','ya'],
            $text
        );
        $text = preg_replace('/[^\w\-]+/', '-', $text);
        return trim($text, '-');
    }
}
