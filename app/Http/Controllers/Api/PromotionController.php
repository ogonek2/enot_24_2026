<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Получить активную модальную акцию
     */
    public function getModalPromotion()
    {
        $promotion = Promotion::current()
            ->modal()
            ->orderBy('sort_order', 'asc')
            ->first();

        if (!$promotion) {
            return response()->json(['promotion' => null]);
        }

        return response()->json([
            'promotion' => [
                'id' => $promotion->id,
                'title' => $promotion->modal_title ?: $promotion->name,
                'description' => $promotion->modal_description ?: $promotion->description,
                'offers' => $promotion->offers,
                'image' => $promotion->image ? asset('storage/' . $promotion->image) : null,
                'cache_minutes' => $promotion->modal_cache_minutes,
            ]
        ]);
    }

    /**
     * Получить акции для баннера
     */
    public function getPromotionsForBanner()
    {
        $promotions = Promotion::current()
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->limit(6)
            ->get();

        $promotionsData = $promotions->map(function ($promotion) {
            return [
                'id' => $promotion->id,
                'title' => $promotion->name,
                'description' => $promotion->description,
                'offers' => $promotion->offers,
                'image' => $promotion->image ? asset('storage/' . $promotion->image) : null,
            ];
        });

        return response()->json([
            'promotions' => $promotionsData
        ]);
    }
}