<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'name',
        'phone',
        'delivery_method',
        'pickup_location_id',
        'delivery_address',
        'items',
        'total',
        'status',
        'notes',
    ];

    protected $casts = [
        'items' => 'array',
        'total' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Связь с пунктом самовывоза
     */
    public function pickupLocation()
    {
        return $this->belongsTo(locations::class, 'pickup_location_id');
    }

    /**
     * Получить информацию о доставке
     */
    public function getDeliveryInfoAttribute()
    {
        if ($this->delivery_method === 'self' && $this->pickupLocation) {
            return $this->pickupLocation->street . ', ' . ($this->pickupLocation->cityRelation->name ?? '');
        } elseif ($this->delivery_method === 'courier') {
            return $this->delivery_address;
        }
        
        return null;
    }

    /**
     * Статусы заказа
     */
    public static function getStatuses()
    {
        return [
            'new' => 'Новий',
            'processing' => 'В обробці',
            'completed' => 'Завершено',
            'cancelled' => 'Скасовано',
        ];
    }

    /**
     * Получить название статуса
     */
    public function getStatusNameAttribute()
    {
        return self::getStatuses()[$this->status] ?? $this->status;
    }
}
