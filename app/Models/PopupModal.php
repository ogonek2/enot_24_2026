<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class PopupModal extends Model
{
    /** Показувати щодня, без прив’язки до календаря дат */
    public const SCHEDULE_ALWAYS = 'always';

    /** Показувати лише в дні зі списку (popup_modal_dates) */
    public const SCHEDULE_SPECIFIC_DATES = 'specific_dates';

    protected $fillable = [
        'admin_title',
        'desktop_banner',
        'mobile_banner',
        'form_title',
        'form_subtitle',
        'is_active',
        'schedule_mode',
        'sort_order',
        'delay_before_show_seconds',
        'seconds_after_close_until_next',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::saved(function (PopupModal $modal) {
            if ($modal->schedule_mode === self::SCHEDULE_ALWAYS) {
                $modal->dates()->delete();
            }
        });
    }

    public function dates(): HasMany
    {
        return $this->hasMany(PopupModalDate::class);
    }

    public function resolvedDesktopUrl(): ?string
    {
        $path = $this->desktop_banner ?: $this->mobile_banner;

        return $path ? asset('storage/' . $path) : null;
    }

    public function resolvedMobileUrl(): ?string
    {
        $path = $this->mobile_banner ?: $this->desktop_banner;

        return $path ? asset('storage/' . $path) : null;
    }

    /**
     * Активні вікна для API: «завжди» або день потрапляє в календар дат.
     */
    public static function scheduledForDate(Carbon $date)
    {
        $day = $date->format('Y-m-d');

        return static::query()
            ->where('is_active', true)
            ->where(function ($query) use ($day) {
                $query->where('schedule_mode', self::SCHEDULE_ALWAYS)
                    ->orWhere(function ($q) use ($day) {
                        $q->where('schedule_mode', self::SCHEDULE_SPECIFIC_DATES)
                            ->whereHas('dates', function ($dates) use ($day) {
                                $dates->whereDate('show_date', $day);
                            });
                    });
            })
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}
