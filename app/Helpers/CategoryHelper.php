<?php

namespace App\Helpers;

use App\Models\Category;

class CategoryHelper
{
    /**
     * Получить категории по типу
     * 
     * @param int $type Тип категории (1 - основные, 2 - дополнительные)
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getByType()
    {
        return Category::all();
    }

    /**
     * Получить все категории с типом
     * 
     * @param int|null $type Тип категории (null - все категории)
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll($type = null)
    {
        $query = Category::query();
        
        if ($type !== null) {
            $query->where('category_type', $type);
        }
        
        return $query->orderBy('name')->get();
    }
}

