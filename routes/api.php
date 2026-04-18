<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PromotionController;
use App\Http\Controllers\Api\ScheduledPopupController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API для модальных акций
Route::get('/modal-promotion', [PromotionController::class, 'getModalPromotion']);

// Заплановані банерні поп-апи з формою (черга за день)
Route::get('/scheduled-popup-modals', [ScheduledPopupController::class, 'index']);

// API для баннера акций
Route::get('/promotions-banner', [PromotionController::class, 'getPromotionsForBanner']);

// API для форм обратной связи
Route::post('/contact', [App\Http\Controllers\FeedbackController::class, 'submit']);
