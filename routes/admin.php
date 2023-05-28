<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\CheckSuperAdminMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:admin'])->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login_handler'])->name('login_handler');
    Route::get('/register', [AdminAuthController::class, 'register'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'registering'])->name('registering');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('home');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});

Route::controller(UserController::class)->name('users.')->prefix('users') ->group(function(){
    Route::get('/', 'index')->name('index');
    Route::group(["middleware"=> CheckSuperAdminMiddleware::class],function () {
        Route::get('/{productID}/edit', 'edit')->name('edit');
        Route::get('/{productID}/show', 'show')->name('show');
    });
    
    Route::get('/{product}/destroy', 'destroy')->name('destroy');
});