<?php

namespace App\Filament\Resources\PopupModalResource\Concerns;

use App\Models\PopupModal;
use Illuminate\Validation\ValidationException;

trait ValidatesPopupModalSchedule
{
    protected function ensurePopupModalScheduleIsValid(): void
    {
        $data = $this->form->getState();

        if (($data['schedule_mode'] ?? null) !== PopupModal::SCHEDULE_SPECIFIC_DATES) {
            return;
        }

        $rows = $data['dates'] ?? [];
        if (! is_array($rows)) {
            $rows = [];
        }

        $filled = 0;
        foreach ($rows as $row) {
            if (is_array($row) && ! empty($row['show_date'])) {
                $filled++;
            }
        }

        if ($filled < 1) {
            throw ValidationException::withMessages([
                'data.dates' => 'Додайте хоча б одну дату або оберіть режим «Показувати постійно».',
            ]);
        }
    }
}
