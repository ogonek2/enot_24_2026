<?php

namespace App\Filament\Resources\PopupModalResource\Pages;

use App\Filament\Resources\PopupModalResource;
use App\Filament\Resources\PopupModalResource\Concerns\ValidatesPopupModalSchedule;
use Filament\Resources\Pages\EditRecord;

class EditPopupModal extends EditRecord
{
    use ValidatesPopupModalSchedule;

    protected static string $resource = PopupModalResource::class;

    protected function afterValidate(): void
    {
        $this->ensurePopupModalScheduleIsValid();
    }
}
