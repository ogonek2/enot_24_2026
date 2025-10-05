<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'href', 'discount_percent', 'discount_active',
    ];

    protected $casts = [
        'discount_active' => 'boolean',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    /**
     * Проверить, активна ли скидка на категорию
     */
    public function hasActiveDiscount()
    {
        return $this->discount_active && $this->discount_percent > 0;
    }

    /**
     * Получить размер скидки в процентах
     */
    public function getDiscountPercent()
    {
        return $this->hasActiveDiscount() ? $this->discount_percent : 0;
    }

    /**
     * Вычислить цену со скидкой
     */
    public function calculateDiscountedPrice($originalPrice)
    {
        if (!$this->hasActiveDiscount()) {
            return $originalPrice;
        }

        $discountAmount = ($originalPrice * $this->discount_percent) / 100;
        return $originalPrice - $discountAmount;
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            if (empty($category->href)) {
                $category->href = self::generateHref($category->name);
            }
        });
    }

    // Метод для генерации href
    public static function generateHref($text)
    {
        $text = mb_strtolower($text);

        $text = str_replace(
            ['а','б','в','г','ґ','д','е','є','ж','з','и','і','ї','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ь','ю','я'],
            ['a','b','v','g','g','d','e','ye','zh','z','y','i','yi','y','k','l','m','n','o','p','r','s','t','u','f','kh','ts','ch','sh','shch','','yu','ya'],
            $text
        );

        $text = preg_replace('/[^\w\-]+/', '-', $text);
        $text = trim($text, '-');

        return $text;
    }
}
