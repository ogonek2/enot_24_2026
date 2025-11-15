<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class CtaHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'title',
        'url',
        'subtitle',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Получить обработанный URL для отображения
     * Поддерживает:
     * - Полные URL (http://...)
     * - Маршруты с параметрами (category_page:prasuvannya)
     * - Относительные пути (/dlya-biznesu)
     */
    public function getResolvedUrlAttribute()
    {
        $url = $this->url;
        
        // Если пусто, возвращаем #
        if (empty($url)) {
            return '#';
        }
        
        // Если это полный URL (http:// или https://), возвращаем как есть
        if (preg_match('/^https?:\/\//', $url)) {
            return $url;
        }
        
        // Если это относительный путь (начинается с /), возвращаем как есть
        if (strpos($url, '/') === 0) {
            return $url;
        }
        
        // Если содержит двоеточие, это может быть маршрут с параметрами (route:param)
        if (strpos($url, ':') !== false) {
            $parts = explode(':', $url, 2);
            $routeName = $parts[0];
            $param = $parts[1] ?? null;
            
            // Проверяем, существует ли такой маршрут
            try {
                if ($param !== null) {
                    return route($routeName, $param);
                } else {
                    return route($routeName);
                }
            } catch (\Exception $e) {
                // Если маршрут не найден, возвращаем исходный URL
                return $url;
            }
        }
        
        // Если это просто имя маршрута без параметров
        try {
            return route($url);
        } catch (\Exception $e) {
            // Если маршрут не найден, возвращаем как относительный путь
            return '/' . ltrim($url, '/');
        }
    }
}
