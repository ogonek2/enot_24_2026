<?php

namespace App\Filament\Resources\IconResource\Pages;

use App\Filament\Resources\IconResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateIcon extends CreateRecord
{
    protected static string $resource = IconResource::class;

    protected function afterCreate(): void
    {
        // После создания записи обновляем информацию о файле
        $record = $this->record;
        
        if ($record->file_path) {
            $fullPath = storage_path('app/public/' . $record->file_path);
            
            if (file_exists($fullPath)) {
                // Обновляем file_name если не установлен
                if (empty($record->file_name)) {
                    $record->file_name = basename($record->file_path);
                }
                
                // Обновляем mime_type
                if (empty($record->mime_type)) {
                    $mimeType = @mime_content_type($fullPath);
                    if (!$mimeType) {
                        $extension = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
                        $mimeTypes = [
                            'svg' => 'image/svg+xml',
                            'png' => 'image/png',
                            'jpg' => 'image/jpeg',
                            'jpeg' => 'image/jpeg',
                        ];
                        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
                    }
                    $record->mime_type = $mimeType;
                }
                
                // Обновляем file_size
                if (empty($record->file_size)) {
                    $record->file_size = filesize($fullPath);
                }
                
                $record->save();
            }
        }
    }
}
