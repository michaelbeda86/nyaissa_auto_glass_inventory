<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('stores', StoreController::class);
Route::resource('products', ProductController::class);
Route::resource('sales', SaleController::class);

// Roles
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Admin area';
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', function () {
        return 'User area';
    });
});


// Store Routes
Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
Route::get('/stores/create', [StoreController::class, 'create'])->name('stores.create');
Route::post('/stores', [StoreController::class, 'store'])->name('stores.store');
Route::get('/stores/{store}', [StoreController::class, 'show'])->name('stores.show');
Route::get('/stores/{store}/edit', [StoreController::class, 'edit'])->name('stores.edit');
Route::put('/stores/{store}', [StoreController::class, 'update'])->name('stores.update');
Route::delete('/stores/{store}', [StoreController::class, 'destroy'])->name('stores.destroy');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/stores/{store}/products', [ProductController::class, 'getProductsByStore']);

// Sale Routes
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
Route::get('/sales/{sale}', [SaleController::class, 'show'])->name('sales.show');
Route::get('/sales/{sale}/edit', [SaleController::class, 'edit'])->name('sales.edit');
Route::put('/sales/{sale}', [SaleController::class, 'update'])->name('sales.update');
Route::delete('/sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');

require __DIR__.'/auth.php';
