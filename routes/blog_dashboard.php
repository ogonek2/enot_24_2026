<?php

use App\Http\Controllers\Dashboard\BlogDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:admin,copywriter'])
    ->prefix('dashboard/blog')
    ->name('blog-dashboard.')
    ->group(function () {
        Route::get('/', [BlogDashboardController::class, 'index'])->name('posts.index');
        Route::get('/create', [BlogDashboardController::class, 'create'])->name('posts.create');
        Route::post('/', [BlogDashboardController::class, 'store'])->name('posts.store');
        Route::get('/{post}/edit', [BlogDashboardController::class, 'edit'])->name('posts.edit');
        Route::put('/{post}', [BlogDashboardController::class, 'update'])->name('posts.update');
    });
