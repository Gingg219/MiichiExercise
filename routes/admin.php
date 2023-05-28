<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:admin'])->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login_handler'])->name('login_handler');
    Route::get('/register', [AdminAuthController::class, 'register'])->name('register');
});
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('home');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});
        