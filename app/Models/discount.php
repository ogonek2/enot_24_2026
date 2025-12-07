<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    protected $table = 'discounts';
    
    protected $fillable = [
        'name', 'link_name', 'banner', 'color', 'sort_order', 'locations', 'umowy', 'discount_action', 'telegram_name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($discount) {
            // Генерируем link_name если не указан
            if (empty($discount->link_name) && !empty($discount->name)) {
                $discount->link_name = self::generateLinkName($discount->name);
            }
            
            // Преобразуем пустую строку banner в null
            if ($discount->banner === '') {
                $discount->banner = null;
            }
        });
    }

    /**
     * Получить полный URL для баннера
     */
    public function getBannerUrlAttribute()
    {
        if (!$this->banner) {
            return null;
        }
        return asset('storage/' . $this->banner);
    }

    /**
     * Генерация URL-friendly имени из текста
     */
    public static function generateLinkName($text)
    {
        // Транслитерация кириллицы в латиницу
        $transliteration = [
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D',
            'Е' => 'E', 'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I',
            'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
            'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'Ts', 'Ч' => 'Ch',
            'Ш' => 'Sh', 'Щ' => 'Sch', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        ];

        $text = mb_strtolower($text, 'UTF-8');
        $text = strtr($text, $transliteration);
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
        $text = preg_replace('/[\s-]+/', '-', $text);
        $text = trim($text, '-');

        return $text;
    }
}