<?php

namespace App\Exports;

use App\Models\Service;

class ServicesExport
{
    public function export()
    {
        $services = Service::with(['categories', 'groups'])
            ->where('price', '>', 0)
            ->get();
        
        $filename = 'services_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($services) {
            $file = fopen('php://output', 'w');
            
            // Добавляем заголовки
            fputcsv($file, [
                'ID',
                'Назва',
                'Ціна',
                'Заголовок',
                'Значення',
                'URL',
                'Категорії',
                'Групи',
                'Створено'
            ]);
            
            // Добавляем данные
            foreach ($services as $service) {
                fputcsv($file, [
                    $service->id,
                    $service->name,
                    $service->price,
                    $service->title,
                    $service->value,
                    $service->href,
                    $service->categories->pluck('name')->join(', '),
                    $service->groups->pluck('name')->join(', '),
                    $service->created_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
