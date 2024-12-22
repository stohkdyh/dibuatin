<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'], 'verified')->name('dashboard');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/order', function () {
    return view('order');
})->middleware(['auth', 'verified'])->name('order');

Route::get('/payment', function () {
    return view('payment');
})->middleware(['auth', 'verified'])->name('payment');


Route::middleware('auth')->group(function () {
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order', [OrderController::class, 'show'])->name('order.show');
    Route::get('/payment', [PaymentController::class, 'processPayment'])->name('payment');
    Route::post('/payment-store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/transaction-history', [HistoryController::class, 'show'])->name('history.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';