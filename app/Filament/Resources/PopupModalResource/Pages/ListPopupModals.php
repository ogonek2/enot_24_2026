<?php

namespace App\Filament\Resources\PopupModalResource\Pages;

use App\Filament\Resources\PopupModalResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPopupModals extends ListRecords
{
    protected static string $resource = PopupModalResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
