<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    
    protected static ?string $navigationLabel = 'Категорії';
    
    protected static ?string $modelLabel = 'Категорія';
    
    protected static ?string $pluralModelLabel = 'Категорії';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основна інформація')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Назва категорії')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('href')
                            ->label('URL адреса')
                            ->maxLength(255)
                            ->helperText('Буде згенеровано автоматично, якщо залишити порожнім'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Налаштування знижки')
                    ->schema([
                        Forms\Components\Toggle::make('discount_active')
                            ->label('Активувати знижку на категорію')
                            ->default(false)
                            ->reactive(),
                        
                        Forms\Components\TextInput::make('discount_percent')
                            ->label('Розмір знижки (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->default(0)
                            ->suffix('%')
                            ->visible(fn ($get) => $get('discount_active'))
                            ->helperText('Від 0 до 100 відсотків'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Назва')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('href')
                    ->label('URL')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_percent')
                    ->label('Знижка (%)')
                    ->sortable(),
                Tables\Columns\IconColumn::make('discount_active')
                    ->label('Активна знижка')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Створено')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }    
}
