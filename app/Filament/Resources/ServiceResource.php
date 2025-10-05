<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use App\Imports\ServicesImport;
use App\Exports\ServicesExport;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\Action;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    
    protected static ?string $navigationLabel = 'Послуги';
    
    protected static ?string $modelLabel = 'Послуга';
    
    protected static ?string $pluralModelLabel = 'Послуги';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Назва'),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->label('Ціна'),
                Forms\Components\TextInput::make('title')
                    ->label('Заголовок'),
                Forms\Components\TextInput::make('value')
                    ->label('Значення'),
                Forms\Components\TextInput::make('href')
                    ->label('URL'),
                Forms\Components\Select::make('groups')
                    ->label('Групи')
                    ->multiple()
                    ->options(\App\Models\Group::pluck('name', 'id'))
                    ->relationship('groups', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Назва'),
                Tables\Columns\TextColumn::make('price')
                    ->label('Ціна'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок'),
                Tables\Columns\TextColumn::make('value')
                    ->label('Значення'),
                Tables\Columns\TextColumn::make('groups.name')
                    ->label('Групи')
                    ->formatStateUsing(function ($record) {
                        return $record->groups->pluck('name')->join(', ');
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Створено'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('export')
                    ->label('Експорт CSV')
                    ->icon('heroicon-s-download')
                    ->action(function () {
                        $export = new ServicesExport();
                        return $export->export();
                    }),
                Action::make('import')
                    ->label('Імпорт CSV')
                    ->icon('heroicon-s-upload')
                    ->form([
                        FileUpload::make('file')
                            ->label('CSV файл')
                            ->acceptedFileTypes(['text/csv', 'application/csv', 'text/plain', '.csv'])
                            ->disk('public')
                            ->directory('imports')
                            ->required()
                            ->storeFileNamesIn('original_filename')
                            ->visibility('private'),
                    ])
                    ->action(function (array $data) {
                        try {
                            // Логируем начало импорта
                            \Log::info('Starting import with data:', $data);
                            
                            // Получаем полный путь к файлу
                            $filePath = storage_path('app/public/' . $data['file']);
                            
                            // Проверяем существование файла
                            if (!file_exists($filePath)) {
                                // Пробуем альтернативные пути
                                $alternativePaths = [
                                    storage_path('app/public/imports/' . basename($data['file'])),
                                    storage_path('app/' . $data['file']),
                                    public_path('storage/' . $data['file']),
                                    $data['file']
                                ];
                                
                                foreach ($alternativePaths as $path) {
                                    if (file_exists($path)) {
                                        $filePath = $path;
                                        break;
                                    }
                                }
                                
                                if (!file_exists($filePath)) {
                                    throw new \Exception('Файл не найден. Проверенные пути: ' . implode(', ', array_merge([$filePath], $alternativePaths)));
                                }
                            }
                            
                            \Log::info('Using file path:', ['path' => $filePath]);
                            
                            $import = new ServicesImport();
                            $result = $import->import($filePath);
                            
                            $message = "Імпортовано: {$result['imported']} записів";
                            if (!empty($result['errors'])) {
                                $message .= "\nПомилки: " . implode("\n", $result['errors']);
                            }
                            
                            \Log::info('Import completed:', $result);
                            
                            // Показываем уведомление через Filament
                            \Filament\Notifications\Notification::make()
                                ->title('Імпорт завершено')
                                ->body($message)
                                ->success()
                                ->send();
                                
                        } catch (\Exception $e) {
                            \Log::error('Import error:', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
                            
                            \Filament\Notifications\Notification::make()
                                ->title('Помилка імпорту')
                                ->body('Помилка: ' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    })
                    ->successNotificationTitle('Імпорт завершено!'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }    
}
