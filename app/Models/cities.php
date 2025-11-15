<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    protected $fillable = [
        'city',
    ];

    /**
     * Получить все локации для этого города
     */
    public function locations()
    {
        return $this->hasMany(locations::class, 'city', 'id');
    }
}

