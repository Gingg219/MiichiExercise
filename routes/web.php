<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'login'])->name('client.login');
Route::post('/login', [AuthController::class, 'login_handler'])->name('client.login_handler');
Route::get('/register', [AuthController::class, 'register'])->name('client.register');
Route::post('/register', [AuthController::class, 'registering'])->name('client.registering');

Route::get('/home', [UserController::class, 'home'])->name('client.home');
Route::post('/logout', [UserController::class, 'logout'])->name('client.logout');
