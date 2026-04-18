<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PopupModalDate extends Model
{
    protected $fillable = [
        'popup_modal_id',
        'show_date',
    ];

    protected $casts = [
        'show_date' => 'date',
    ];

    public function popupModal(): BelongsTo
    {
        return $this->belongsTo(PopupModal::class);
    }
}
