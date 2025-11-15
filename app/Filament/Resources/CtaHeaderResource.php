<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CtaHeaderResource\Pages;
use App\Filament\Resources\CtaHeaderResource\RelationManagers;
use App\Models\CtaHeader;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CtaHeaderResource extends Resource
{
    protected static ?string $model = CtaHeader::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    
    protected static ?string $navigationLabel = 'CTA Header';
    
    protected static ?string $modelLabel = 'CTA Header';
    
    protected static ?string $pluralModelLabel = 'CTA Headers';
    
    protected static ?string $navigationGroup = 'Контент';
    
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основна інформація')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->label('Назва')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('url')
                            ->required()
                            ->label('Посилання')
                            ->maxLength(255)
                            ->helperText('Можна вказати: повний URL (http://...), маршрут з параметром (category_page:prasuvannya), ім\'я маршруту (b2b_page) або відносний шлях (/dlya-biznesu)'),
                        Forms\Components\TextInput::make('subtitle')
                            ->required()
                            ->label('Сабтайтл')
                            ->maxLength(255)
                            ->helperText('Невеликий опис під назвою'),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Порядок сортування')
                            ->numeric()
                            ->default(0)
                            ->helperText('Чим менше число, тим вище елемент'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Іконка')
                    ->schema([
                        Forms\Components\FileUpload::make('icon')
                            ->label('Іконка')
                            ->image()
                            ->directory('src/icons_svg')
                            ->disk('public')
                            ->visibility('public')
                            ->nullable()
                            ->helperText('SVG або PNG іконка для відображення'),
                    ]),
                
                Forms\Components\Section::make('Статус')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Активний')
                            ->default(true)
                            ->helperText('Відображати на сайті'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon')
                    ->label('Іконка')
                    ->circular()
                    ->size(50)
                    ->getStateUsing(function ($record) {
                        if (!$record || !$record->icon) {
                            return null;
                        }
                        return $record->icon;
                    })
                    ->url(function ($record) {
                        if (!$record || !$record->icon) {
                            return null;
                        }
                        return asset('storage/' . $record->icon);
                    }),
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Назва')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Сабтайтл')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('url')
                    ->label('Посилання')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активний')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Створено')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Активні')
                    ->placeholder('Всі')
                    ->trueLabel('Тільки активні')
                    ->falseLabel('Тільки неактивні'),
            ])
            ->defaultSort('sort_order', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCtaHeaders::route('/'),
            'create' => Pages\CreateCtaHeader::route('/create'),
            'edit' => Pages\EditCtaHeader::route('/{record}/edit'),
        ];
    }    
}
