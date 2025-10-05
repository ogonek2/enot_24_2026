<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexServices;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexServices::class, 'index'])->name('welcome');
Route::get('/poslugi-ta-cini', [IndexServices::class, 'services'])->name('services');
Route::get('/poslugi-ta-cini/{category}', [IndexServices::class, 'category_page'])->name('category_page');
Route::get('/api/search-services', [IndexServices::class, 'searchServices'])->name('search_services');
Route::get('/api/placeholder-services', [IndexServices::class, 'getPlaceholderServices'])->name('placeholder_services');
Route::get('/dlya-biznesu', [IndexServices::class, 'b2b'])->name('b2b_page');
Route::get('/dlya-biznesu/{page}', [IndexServices::class, 'b2bShow'])->name('b2b_page_show');
Route::get('/viklikati-kuryera', [IndexServices::class, 'courier'])->name('courier_page');
Route::get('/dostavka', [IndexServices::class, 'delivery'])->name('delivery_page');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Feedback form route
Route::post('/feedback', [App\Http\Controllers\FeedbackController::class, 'submit'])->name('feedback.submit');

// Import services route
Route::post('/admin/services/import', [App\Filament\Resources\ServiceResource\Pages\ImportServices::class, 'import'])->name('filament.resources.services.import');

// Test Telegram notification (remove in production)
Route::get('/test-telegram', function() {
    $controller = new App\Http\Controllers\FeedbackController();
    $reflection = new ReflectionClass($controller);
    $method = $reflection->getMethod('sendTelegramNotification');
    $method->setAccessible(true);
    
    try {
        $result = $method->invoke($controller, 'Test User', '+380123456789', 'Test message from website');
        return response()->json(['success' => true, 'message' => 'Telegram notification sent successfully']);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
});

Auth::routes();