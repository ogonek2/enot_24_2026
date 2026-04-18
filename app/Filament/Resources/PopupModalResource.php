<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PopupModalResource\Pages;
use App\Models\PopupModal;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\TernaryFilter;

class PopupModalResource extends Resource
{
    protected static ?string $model = PopupModal::class;

    protected static ?string $navigationIcon = 'heroicon-o-template';

    protected static ?string $navigationLabel = 'Банерні поп-апи';

    protected static ?string $modelLabel = 'Поп-ап';

    protected static ?string $pluralModelLabel = 'Банерні поп-апи';

    protected static ?string $navigationGroup = 'Контент';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основне')
                    ->schema([
                        Forms\Components\TextInput::make('admin_title')
                            ->label('Назва (тільки для адмінки)')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Активне')
                            ->default(true),
                        Forms\Components\Radio::make('schedule_mode')
                            ->label('Коли показувати на сайті')
                            ->options([
                                PopupModal::SCHEDULE_ALWAYS => 'Показувати постійно',
                                PopupModal::SCHEDULE_SPECIFIC_DATES => 'Лише в обрані дні',
                            ])
                            ->default(PopupModal::SCHEDULE_SPECIFIC_DATES)
                            ->reactive()
                            ->required()
                            ->helperText('Якщо обрано «Постійно», календар дат не використовується. Якщо «Обрані дні» — нижче додайте дати.')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Порядок у черзі за день')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->helperText('Менше число — раніше в черзі, коли за один день кілька вікон'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Банери')
                    ->description('Якщо завантажено лише одне зображення, воно використовується і для ПК, і для мобільних.')
                    ->schema([
                        Forms\Components\FileUpload::make('desktop_banner')
                            ->label('Банер для ПК')
                            ->image()
                            ->directory('src/popup_modals')
                            ->disk('public')
                            ->visibility('public')
                            ->nullable()
                            ->getUploadedFileUrlUsing(function ($file) {
                                if (! $file) {
                                    return null;
                                }

                                return asset('storage/'.$file);
                            }),
                        Forms\Components\FileUpload::make('mobile_banner')
                            ->label('Банер для мобільних')
                            ->image()
                            ->directory('src/popup_modals')
                            ->disk('public')
                            ->visibility('public')
                            ->nullable()
                            ->getUploadedFileUrlUsing(function ($file) {
                                if (! $file) {
                                    return null;
                                }

                                return asset('storage/'.$file);
                            }),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Текст біля форми')
                    ->schema([
                        Forms\Components\TextInput::make('form_title')
                            ->label('Заголовок')
                            ->maxLength(255)
                            ->placeholder('Зв\'яжіться з нами')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('form_subtitle')
                            ->label('Підзаголовок')
                            ->maxLength(500)
                            ->placeholder('Заповніть форму і ми обов\'язково відповімо')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Час показу')
                    ->schema([
                        Forms\Components\TextInput::make('delay_before_show_seconds')
                            ->label('Затримка перед першим показом (сек)')
                            ->numeric()
                            ->default(3)
                            ->minValue(0)
                            ->required()
                            ->helperText('Відлік від завантаження сторінки до першого вікна в черзі за цей день (береться з першого запису в черзі за sort_order).'),
                        Forms\Components\TextInput::make('seconds_after_close_until_next')
                            ->label('Інтервал до наступного вікна (сек)')
                            ->numeric()
                            ->default(300)
                            ->minValue(0)
                            ->required()
                            ->helperText('Після закриття цього вікна стільки секунд чекати до наступного в черзі за той самий день.'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Календар показу')
                    ->description('Потрібно лише в режимі «Лише в обрані дні».')
                    ->schema([
                        Forms\Components\Repeater::make('dates')
                            ->relationship()
                            ->schema([
                                Forms\Components\DatePicker::make('show_date')
                                    ->label('Дата')
                                    ->displayFormat('d.m.Y')
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->createItemButtonLabel('Додати дату')
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (callable $get) => $get('schedule_mode') === PopupModal::SCHEDULE_SPECIFIC_DATES),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Пор.')
                    ->sortable(),
                Tables\Columns\TextColumn::make('admin_title')
                    ->label('Назва')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('is_active')
                    ->label('Акт.')
                    ->formatStateUsing(fn ($state) => $state ? 'Так' : 'Ні'),
                Tables\Columns\TextColumn::make('schedule_mode')
                    ->label('Режим')
                    ->formatStateUsing(function ($state) {
                        return $state === PopupModal::SCHEDULE_ALWAYS ? 'Постійно' : 'За датами';
                    }),
                Tables\Columns\ImageColumn::make('desktop_banner')
                    ->label('ПК')
                    ->height(40)
                    ->getStateUsing(fn (PopupModal $record) => $record->desktop_banner ?: $record->mobile_banner)
                    ->url(fn (PopupModal $record) => ($record->desktop_banner ?: $record->mobile_banner)
                        ? asset('storage/'.($record->desktop_banner ?: $record->mobile_banner))
                        : null),
                Tables\Columns\TextColumn::make('dates_count')
                    ->counts('dates')
                    ->label('Дат'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Оновлено')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Активні'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPopupModals::route('/'),
            'create' => Pages\CreatePopupModal::route('/create'),
            'edit' => Pages\EditPopupModal::route('/{record}/edit'),
        ];
    }
}
