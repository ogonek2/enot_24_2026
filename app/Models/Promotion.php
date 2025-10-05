<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'offers',
        'is_active',
        'show_in_modal',
        'modal_cache_minutes',
        'modal_title',
        'modal_description',
        'start_date',
        'end_date',
        'image',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_in_modal' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Scope для активных акций
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope для акций, действующих в данный момент
    public function scopeCurrent($query)
    {
        $now = now()->toDateString();
        return $query->where('is_active', true)
                    ->where(function($q) use ($now) {
                        $q->whereNull('start_date')
                          ->orWhere('start_date', '<=', $now);
                    })
                    ->where(function($q) use ($now) {
                        $q->whereNull('end_date')
                          ->orWhere('end_date', '>=', $now);
                    });
    }

    // Scope для модальных акций
    public function scopeModal($query)
    {
        return $query->where('show_in_modal', true);
    }
}
