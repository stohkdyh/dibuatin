<?php

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
})->middleware(['auth', 'verified'])->name('services');

Route::get('/gallery', function () {
    return view('gallery');
})->middleware(['auth', 'verified'])->name('gallery');

Route::get('/order', function () {
    return view('order');
})->middleware(['auth', 'verified'])->name('order');

// Route::middleware(['admin.access'])->group(function () {
//     Route::get('/admin', [::class, 'index'])->name('admin.dashboard');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';