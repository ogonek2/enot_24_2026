<?php

namespace App\Filament\Resources\CtaHeaderResource\Pages;

use App\Filament\Resources\CtaHeaderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCtaHeader extends EditRecord
{
    protected static string $resource = CtaHeaderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
