<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionResource\Pages;
use App\Models\discount;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class PromotionResource extends Resource
{
    protected static ?string $model = discount::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationLabel = 'Акції';

    protected static ?string $modelLabel = 'Акція';

    protected static ?string $pluralModelLabel = 'Акції';

    protected static ?string $navigationGroup = 'Контент';
    
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основна інформація')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Назва акції')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('link_name')
                            ->label('URL адреса')
                            ->maxLength(255)
                            ->helperText('Буде згенеровано автоматично, якщо залишити порожнім')
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('discount_action')
                            ->label('Дія знижки')
                            ->maxLength(255)
                            ->helperText('Наприклад: "До -35%"')
                            ->nullable(),
                        
                        Forms\Components\TextInput::make('locations')
                            ->label('Локації')
                            ->maxLength(255)
                            ->helperText('Де діє акція (наприклад: "ВСІ" або назви міст)')
                            ->default('ВСІ')
                            ->nullable(),
                        
                        Forms\Components\TextInput::make('telegram_name')
                            ->label('Назва для Telegram')
                            ->maxLength(255)
                            ->helperText('Назва акції для відправки в Telegram')
                            ->nullable(),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Порядок сортування')
                            ->numeric()
                            ->default(0)
                            ->helperText('Чим менше число, тим вище акція в списку')
                            ->required(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Опис акції')
                    ->schema([
                        Forms\Components\Placeholder::make('umowy_info')
                            ->label('Опис')
                            ->content(new \Illuminate\Support\HtmlString('
                                <div class="text-sm text-gray-600 mb-2">
                                    <p>Використовуйте HTML для форматування тексту.</p>
                                    <p>Наприклад: &lt;p&gt;Текст абзацу&lt;/p&gt;, &lt;strong&gt;Жирний текст&lt;/strong&gt;, &lt;ul&gt;&lt;li&gt;Елемент списку&lt;/li&gt;&lt;/ul&gt;</p>
                                </div>
                            ')),
                        
                        Forms\Components\Textarea::make('umowy')
                            ->label('Опис акції (HTML)')
                            ->rows(10)
                            ->helperText('HTML опис акції, який відображається на сторінці акції')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Зображення та колір')
                    ->schema([
                        Forms\Components\FileUpload::make('banner')
                            ->label('Банер акції')
                            ->image()
                            ->directory('src/stock_images')
                            ->disk('public')
                            ->visibility('public')
                            ->nullable()
                            ->helperText('Зображення для відображення акції')
                            ->getUploadedFileUrlUsing(function ($file) {
                                if (!$file) {
                                    return null;
                                }
                                // Формируем правильный URL: storage/src/stock_images/filename.png
                                return asset('storage/' . $file);
                            }),
                        
                        Forms\Components\TextInput::make('color')
                            ->label('Колір фону акції')
                            ->type('color')
                            ->helperText('Колір фону для карточки акції')
                            ->default('#fdd9e5')
                            ->nullable(),
                        
                        Forms\Components\TextInput::make('text_color')
                            ->label('Колір тексту назви')
                            ->type('color')
                            ->helperText('Колір тексту назви акції (name)')
                            ->nullable(),
                        
                        Forms\Components\TextInput::make('discount_color')
                            ->label('Колір тексту знижки')
                            ->type('color')
                            ->helperText('Колір тексту знижки (discount_action)')
                            ->nullable(),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner')
                    ->label('Банер')
                    ->circular()
                    ->size(50)
                    ->getStateUsing(function ($record) {
                        if (!$record || !$record->banner) {
                            return null;
                        }
                        // Путь в БД: src/stock_images/...
                        return $record->banner;
                    })
                    ->url(function ($record) {
                        if (!$record || !$record->banner) {
                            return null;
                        }
                        // Формируем правильный URL как в Blade: asset('storage/' . $record->banner)
                        return asset('storage/' . $record->banner);
                    }),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable()
                    ->default(0),
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Назва')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('discount_action')
                    ->label('Дія знижки')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('color')
                    ->label('Колір')
                    ->formatStateUsing(function ($state) {
                        if (!$state) {
                            return '—';
                        }
                        return new \Illuminate\Support\HtmlString(
                            '<div style="display: inline-block; width: 20px; height: 20px; background-color: ' . $state . '; border: 1px solid #ccc; border-radius: 3px; vertical-align: middle;"></div> ' . $state
                        );
                    })
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('locations')
                    ->label('Локації')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('link_name')
                    ->label('URL')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('telegram_name')
                    ->label('Telegram')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Створено')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Оновлено')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('sort_order', 'asc');
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
            'index' => Pages\ListPromotions::route('/'),
            'create' => Pages\CreatePromotion::route('/create'),
            'edit' => Pages\EditPromotion::route('/{record}/edit'),
        ];
    }
}