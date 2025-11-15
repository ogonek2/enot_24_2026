<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\locations;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    
    protected static ?string $navigationLabel = 'Замовлення';
    
    protected static ?string $modelLabel = 'Замовлення';
    
    protected static ?string $pluralModelLabel = 'Замовлення';
    
    protected static ?string $navigationGroup = 'Замовлення';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Інформація про клієнта')
                    ->schema([
                        Forms\Components\TextInput::make('order_id')
                            ->label('Номер замовлення')
                            ->required()
                            ->maxLength(255)
                            ->disabled(),
                        Forms\Components\TextInput::make('name')
                            ->label('Ім\'я клієнта')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->label('Телефон')
                            ->required()
                            ->maxLength(20)
                            ->tel(),
                    ])
                    ->columns(3),
                
                Forms\Components\Section::make('Доставка')
                    ->schema([
                        Forms\Components\Select::make('delivery_method')
                            ->label('Спосіб отримання')
                            ->options([
                                'self' => 'Самовивіз',
                                'courier' => 'Кур\'єрська доставка',
                            ])
                            ->required()
                            ->reactive(),
                        Forms\Components\Select::make('pickup_location_id')
                            ->label('Приймальний пункт')
                            ->options(locations::with('cityRelation')->get()->mapWithKeys(function ($location) {
                                $cityName = $location->cityRelation->city ?? $location->city;
                                return [$location->id => $location->street . ', ' . $cityName];
                            }))
                            ->visible(fn ($get) => $get('delivery_method') === 'self'),
                        Forms\Components\Textarea::make('delivery_address')
                            ->label('Адреса доставки')
                            ->rows(3)
                            ->visible(fn ($get) => $get('delivery_method') === 'courier'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Товари замовлення')
                    ->schema([
                        Forms\Components\Placeholder::make('items_preview')
                            ->label('Товари')
                            ->content(function ($record) {
                                if (!$record || !$record->items) {
                                    return 'Немає товарів';
                                }
                                
                                $items = is_array($record->items) ? $record->items : json_decode($record->items, true);
                                if (!is_array($items)) {
                                    return 'Немає товарів';
                                }
                                
                                $html = '<div class="space-y-2">';
                                foreach ($items as $item) {
                                    $cleaningType = $item['cleaning_type'] === 'individual' ? 'Індивідуальна' : 'Потокова';
                                    $html .= '<div class="p-3 bg-gray-50 rounded-lg">';
                                    $html .= '<div class="font-semibold">' . ($item['service_name'] ?? '—') . '</div>';
                                    $html .= '<div class="text-sm text-gray-600">Категорія: ' . ($item['category_name'] ?? '—') . '</div>';
                                    $html .= '<div class="text-sm text-gray-600">Тип: ' . $cleaningType . '</div>';
                                    $html .= '<div class="text-sm text-gray-600">Кількість: ' . ($item['quantity'] ?? 0) . ' × ' . number_format($item['price'] ?? 0, 0, ',', ' ') . '₴ = ' . number_format($item['total'] ?? 0, 0, ',', ' ') . '₴</div>';
                                    $html .= '</div>';
                                }
                                $html .= '</div>';
                                
                                return new \Illuminate\Support\HtmlString($html);
                            }),
                    ])
                    ->collapsible(),
                
                Forms\Components\Section::make('Статус та примітки')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Статус замовлення')
                            ->options(Order::getStatuses())
                            ->required()
                            ->default('new'),
                        Forms\Components\TextInput::make('total')
                            ->label('Загальна сума')
                            ->numeric()
                            ->required()
                            ->prefix('₴')
                            ->disabled(),
                        Forms\Components\Textarea::make('notes')
                            ->label('Примітки')
                            ->rows(3)
                            ->maxLength(1000),
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Дата створення')
                            ->content(fn ($record) => $record ? $record->created_at->format('d.m.Y H:i:s') : '—'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_id')
                    ->label('Номер замовлення')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Клієнт')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Статус')
                    ->formatStateUsing(fn ($state) => Order::getStatuses()[$state] ?? $state)
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivery_method')
                    ->label('Доставка')
                    ->formatStateUsing(fn ($state) => $state === 'self' ? 'Самовивіз' : 'Кур\'єр'),
                Tables\Columns\TextColumn::make('total')
                    ->label('Сума')
                    ->money('UAH', '', 0)
                    ->sortable(),
                Tables\Columns\TextColumn::make('items_count')
                    ->label('Кількість товарів')
                    ->getStateUsing(function ($record) {
                        if (!$record || !$record->items) {
                            return 0;
                        }
                        
                        $items = $record->items;
                        if (is_array($items)) {
                            return count($items);
                        }
                        if (is_string($items)) {
                            $decoded = json_decode($items, true);
                            return is_array($decoded) ? count($decoded) : 0;
                        }
                        return 0;
                    })
                    ->sortable(false),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата створення')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Статус')
                    ->options(Order::getStatuses()),
                Tables\Filters\SelectFilter::make('delivery_method')
                    ->label('Спосіб доставки')
                    ->options([
                        'self' => 'Самовивіз',
                        'courier' => 'Кур\'єрська доставка',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListOrders::route('/'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }    
    
    public static function canCreate(): bool
    {
        return false; // Заказы создаются только через сайт
    }
}
