<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;

// main routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

// sudah login
Route::middleware('auth')->group(function() {
    Route::prefix('/beli')->group(function() {
        Route::get('/{stock}', [TransactionController::class, 'transactionInput'])->name('transactionInput');
        Route::post('/{stock}', [TransactionController::class, 'transactionStore'])->name('transactionStore');
    });
    Route::get('/bayar',[TransactionController::class, 'metodeBayar'])->name('metodeBayar');
    Route::prefix('/cart')->group(function() {
        Route::get('/', [CartController::class, 'cartIndex'])->name('cartIndex');
        Route::get('/{product}', [CartController::class, 'cartDestroy'])->name('cartDestroy');
        Route::post('/{user_id}', [CartController::class, 'cartStore'])->name('cartStore');
    });
    Route::get('/history', [CartController::class, 'cartHistory'])->name('cartHistory');
    Route::get('/user/{user:email}', [AutentikasiController::class, 'userDetail'])->name('userDetail');
    Route::post('/logout', [AutentikasiController::class, 'logout'])->name('logout');
});

// kelola stock
Route::resource('/stock',StockController::class)->middleware('admin');

// admin kelola pesanan
Route::middleware('admin')->prefix('/pesanan')->group(function() {
    Route::get('/', [TransactionController::class, 'pesananIndex'])->name('pesananIndex');
    Route::get('/{user_id}', [TransactionController::class, 'pesananDetail'])->name('pesananDetail');
    Route::post('/{user_id}', [TransactionController::class, 'kirimPesanan'])->name('kirimPesanan');
});

// belum ada akun
Route::middleware('guest')->group(function () {
    Route::get('/register', [AutentikasiController::class, 'register'])->name('register');
    Route::post('/register', [AutentikasiController::class, 'createRegister'])->name('crateRegister');
    Route::get('/login', [AutentikasiController::class, 'login'])->name('login');
    Route::post('/login', [AutentikasiController::class, 'createLogin'])->name('createLogin');
});