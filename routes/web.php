<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Lab\CategoryLabController;
use App\Http\Controllers\Lab\ProductLabController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/flash-demo', [DashboardController::class, 'flashDemo'])->name('flash-demo');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('/settings', [SettingController::class, 'edit'])->name('settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

// ===== Phiếu 09: Lab routes (Eloquent CRUD test) =====
Route::get('/lab/categories', [CategoryLabController::class, 'index']);
Route::post('/lab/categories', [CategoryLabController::class, 'store']);
Route::get('/lab/categories/{id}', [CategoryLabController::class, 'show']);
Route::put('/lab/categories/{id}', [CategoryLabController::class, 'update']);
Route::delete('/lab/categories/{id}', [CategoryLabController::class, 'destroy']);

Route::get('/lab/products', [ProductLabController::class, 'index']);
Route::post('/lab/products', [ProductLabController::class, 'store']);
Route::get('/lab/products/{id}', [ProductLabController::class, 'show']);
Route::put('/lab/products/{id}', [ProductLabController::class, 'update']);
Route::delete('/lab/products/{id}', [ProductLabController::class, 'destroy']);