<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\OrderController;

// Strona główna (dostępna dla wszystkich)
Route::get('/', function () {
    return view('home');
})->name('/');

// Laravel Auth (logowanie i rejestracja)
Auth::routes();

// Trasy dostępne tylko dla zalogowanych użytkowników
Route::middleware(['auth'])->group(function () {
    // Trasa do wyświetlania konta użytkownika
    Route::get('/account', [AccountController::class, 'index'])->name('account');

    // Trasa do aktualizacji danych użytkownika
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');

    // Trasa dodawania opinii do produktu
    Route::post('/opinions', [OpinionController::class, 'store'])->name('store');

    // Trasa usuwania opinii produktu
    Route::get('delete{id}', [OpinionController::class, 'destroy'])->name('delete');

    // Trasa do składania zamówienia
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::post('/order', [OrderController::class, 'submit'])->name('submitOrder');

    // Trasa do wyświetlania zamówień użytkownika
    Route::get('/orders', [OrderController::class, 'show'])->name('showOrders');
});

// Trasy dostępne dla wszystkich użytkowników (zalogowanych i niezalogowanych)
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/products/latest', [ProductsController::class, 'showNewArrivals'])->name('newArrivals');
Route::get('/products/popular', [ProductsController::class, 'showPopular'])->name('popular');
Route::get('/products/search', [ProductsController::class, 'search'])->name('search');
Route::get('/product/{productId}', [ProductController::class, 'show'])->name('show');
Route::get('/shopping-cart', [ShoppingCartController::class, 'index'])->name('cart');
