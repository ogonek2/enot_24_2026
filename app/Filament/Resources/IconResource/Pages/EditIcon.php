<?php

namespace App\Filament\Resources\IconResource\Pages;

use App\Filament\Resources\IconResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIcon extends EditRecord
{
    protected static string $resource = IconResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
