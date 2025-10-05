<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Imports\ServicesImport;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

class ImportServices extends Page
{
    protected static string $resource = ServiceResource::class;

    protected static string $view = 'filament.pages.import-services';

    protected static ?string $title = 'Імпорт послуг';

    public function mount(): void
    {
        // Проверяем права доступа
        $this->authorize('viewAny', ServiceResource::getModel());
    }

    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->label('Назад до списку')
                ->url(ServiceResource::getUrl('index'))
                ->color('gray'),
        ];
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:10240', // 10MB max
        ]);

        try {
            $file = $request->file('file');
            $filePath = $file->store('imports', 'public');
            $fullPath = storage_path('app/public/' . $filePath);

            \Log::info('Import file uploaded:', [
                'original_name' => $file->getClientOriginalName(),
                'stored_path' => $filePath,
                'full_path' => $fullPath
            ]);

            $import = new ServicesImport();
            $result = $import->import($fullPath);

            $message = "Імпортовано: {$result['imported']} записів";
            if (!empty($result['errors'])) {
                $message .= "\nПомилки: " . implode("\n", $result['errors']);
            }

            Notification::make()
                ->title('Імпорт завершено')
                ->body($message)
                ->success()
                ->send();

            return redirect()->route('filament.resources.services.index');

        } catch (\Exception $e) {
            \Log::error('Import error:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            Notification::make()
                ->title('Помилка імпорту')
                ->body('Помилка: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }
}
