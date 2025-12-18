<?php

namespace App\Filament\Resources\IconResource\Pages;

use App\Filament\Resources\IconResource;
use App\Models\Icon;
use Filament\Pages\Actions;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Notifications\Notification;

class BulkUploadIcons extends Page
{
    protected static string $resource = IconResource::class;

    protected static string $view = 'filament.resources.icon-resource.pages.bulk-upload-icons';

    protected static ?string $title = 'Масове завантаження іконок';

    public $files = [];

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Завантаження іконок')
                ->schema([
                    Forms\Components\FileUpload::make('files')
                        ->label('Файли іконок')
                        ->multiple()
                        ->directory('src/icons_svg')
                        ->disk('public')
                        ->visibility('public')
                        ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg'])
                        ->maxSize(2048)
                        ->required()
                        ->helperText('Можна завантажити кілька іконок одночасно. SVG, PNG або JPEG. Максимальний розмір: 2MB на файл'),
                ]),
        ];
    }

    public function save()
    {
        $data = $this->form->getState();
        $files = $data['files'] ?? [];
        
        if (empty($files)) {
            Notification::make()
                ->title('Помилка')
                ->body('Будь ласка, виберіть файли для завантаження')
                ->danger()
                ->send();
            return;
        }

        $uploaded = 0;
        $errors = [];

        foreach ($files as $filePath) {
            try {
                $fullPath = storage_path('app/public/' . $filePath);
                
                if (!file_exists($fullPath)) {
                    $errors[] = "Файл не знайдено: {$filePath}";
                    continue;
                }

                // Проверяем, не существует ли уже такая иконка
                $existing = Icon::where('file_path', $filePath)->first();
                if ($existing) {
                    $errors[] = "Іконка вже існує: " . basename($filePath);
                    continue;
                }

                $fileName = basename($filePath);
                $mimeType = mime_content_type($fullPath);
                $fileSize = filesize($fullPath);
                
                // Генерируем имя из имени файла
                $name = pathinfo($fileName, PATHINFO_FILENAME);
                $name = str_replace(['-', '_'], ' ', $name);
                $name = ucwords($name);
                
                Icon::create([
                    'name' => $name,
                    'file_path' => $filePath,
                    'file_name' => $fileName,
                    'mime_type' => $mimeType,
                    'file_size' => $fileSize,
                ]);

                $uploaded++;
            } catch (\Exception $e) {
                $errors[] = "Помилка при завантаженні " . basename($filePath) . ": " . $e->getMessage();
            }
        }

        $message = "Завантажено: {$uploaded} іконок";
        if (!empty($errors)) {
            $message .= "\nПомилки: " . count($errors);
        }

        Notification::make()
            ->title('Завантаження завершено')
            ->body($message)
            ->success()
            ->send();

        if (!empty($errors)) {
            foreach ($errors as $error) {
                Notification::make()
                    ->title('Помилка')
                    ->body($error)
                    ->danger()
                    ->send();
            }
        }

        $this->form->fill();
        
        return redirect(static::getResource()::getUrl('index'));
    }

    protected function getActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label('Завантажити іконки')
                ->action('save')
                ->color('success'),
        ];
    }
}

