<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionResource\Pages;
use App\Models\Promotion;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromotionResource extends Resource
{
    protected static ?string $model = Promotion::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationLabel = 'Акції';

    protected static ?string $modelLabel = 'Акція';

    protected static ?string $pluralModelLabel = 'Акції';

    protected static ?string $navigationGroup = 'Контент';

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
                        
                        Forms\Components\Textarea::make('description')
                            ->label('Опис')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('offers')
                            ->label('Пропозиції')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Налаштування')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Активна')
                            ->default(true),
                        
                        Forms\Components\Toggle::make('show_in_modal')
                            ->label('Показувати в модальному вікні')
                            ->default(false),
                        
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Дата початку')
                            ->nullable(),
                        
                        Forms\Components\DatePicker::make('end_date')
                            ->label('Дата закінчення')
                            ->nullable(),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Порядок сортування')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Модальне вікно')
                    ->schema([
                        Forms\Components\TextInput::make('modal_title')
                            ->label('Заголовок модального вікна')
                            ->maxLength(255)
                            ->nullable(),
                        
                        Forms\Components\Textarea::make('modal_description')
                            ->label('Опис для модального вікна')
                            ->rows(3)
                            ->nullable(),
                        
                        Forms\Components\TextInput::make('modal_cache_minutes')
                            ->label('Час кешування (хвилини)')
                            ->numeric()
                            ->default(1440) // 24 часа = 1440 минут
                            ->minValue(1)
                            ->maxValue(10080), // 7 дней = 10080 минут
                    ])
                    ->columns(1)
                    ->visible(fn ($get) => $get('show_in_modal')),
                
                Forms\Components\Section::make('Зображення')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Зображення акції')
                            ->image()
                            ->directory('promotions')
                            ->disk('public')
                            ->visibility('public')
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Зображення')
                    ->circular()
                    ->size(50)
                    ->disk('public')
                    ->visibility('public'),
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Назва')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('description')
                    ->label('Опис')
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активна')
                    ->boolean(),
                
                Tables\Columns\IconColumn::make('show_in_modal')
                    ->label('Модальне')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Дата початку')
                    ->date('d.m.Y')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Дата закінчення')
                    ->date('d.m.Y')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable(),
                
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
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Активні')
                    ->boolean()
                    ->trueLabel('Тільки активні')
                    ->falseLabel('Тільки неактивні'),
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