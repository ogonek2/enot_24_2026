<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'article', 'price', 'individual_price', 'category_id', 'marker', 'title', 'value', 'href', 'transform_url',
        'seo_description', 'seo_keywords', 'description', 'type_page', 'promotion', 'created_at', 'updated_at', 'sort_order'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'service_group');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($service) {
            // Генерируем transform_url если не указан
            if (empty($service->transform_url)) {
                $service->transform_url = self::generateHref($service->name);
            }
        });
    }
    
    /**
     * Accessor для href - возвращает transform_url для обратной совместимости
     */
    public function getHrefAttribute()
    {
        return $this->attributes['transform_url'] ?? null;
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
