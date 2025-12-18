<?php

namespace App\Filament\Resources\IconResource\Pages;

use App\Filament\Resources\IconResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIcons extends ListRecords
{
    protected static string $resource = IconResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('bulk-upload')
                ->label('Масове завантаження')
                ->icon('heroicon-o-cloud-upload')
                ->url(IconResource::getUrl('bulk-upload'))
                ->color('success'),
        ];
    }
}
