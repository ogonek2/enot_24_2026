<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\discount;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Получить активную модальную акцию
     * 
     * Примечание: модель discount не поддерживает модальные окна.
     * Этот метод возвращает null, так как функциональность модальных окон
     * не реализована для модели discount.
     */
    public function getModalPromotion()
    {
        // Модель discount не имеет полей для модальных окон
        // Возвращаем null, так как функциональность не реализована
        return response()->json(['promotion' => null]);
    }

    /**
     * Получить акции для баннера
     */
    public function getPromotionsForBanner()
    {
        $promotions = discount::orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        $promotionsData = $promotions->map(function ($promotion) {
            return [
                'id' => $promotion->id,
                'title' => $promotion->name,
                'description' => strip_tags($promotion->umowy ?? ''),
                'offers' => $promotion->umowy ?? '',
                'image' => $promotion->banner ? asset('storage/' . $promotion->banner) : null,
                'discount_action' => $promotion->discount_action ?? '',
                'locations' => $promotion->locations ?? 'ВСІ',
            ];
        });

        return response()->json([
            'promotions' => $promotionsData
        ]);
    }
}