<?php

namespace App\Helpers;

use App\Models\Category;

class CategoryHelper
{
    /**
     * Получить категории по типу
     * 
     * @param int|null $type Тип категории (1 - основные, 2 - дополнительные, null - все)
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getByType($type = null)
    {
        $query = Category::query()
            ->whereNull('parent_id') // Только родительские категории
            ->with(['services', 'children.services']);
        
        if ($type !== null) {
            $query->where('category_type', $type);
        }
        
        // Сортировка: сначала по порядку сортировки (sort_order), затем по имени
        return $query->orderBy('sort_order', 'asc')
                     ->orderBy('name')
                     ->get();
    }

    /**
     * Получить все категории с типом
     * 
     * @param int|null $type Тип категории (null - все категории)
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll($type = null)
    {
        $query = Category::query()
            ->whereNull('parent_id') // Только родительские категории
            ->with(['services', 'children.services']);
        
        if ($type !== null) {
            $query->where('category_type', $type);
        }
        
        // Сортировка: сначала по порядку сортировки (sort_order), затем по имени
        return $query->orderBy('sort_order', 'asc')
                     ->orderBy('name')
                     ->get();
    }
}

