<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['web'])->group(function () {
    Route::get('/login',[AdminAuthController::class, 'login'] )->name('login');
    Route::get('/register',[AdminAuthController::class, 'register'] )->name('register');
    Route::get('/', function () {
        return view('admin.index');
    });
});

Route::controller(ProductController::class)->name('products.')->prefix('products') ->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/{productID}/edit', 'edit')->name('edit');
    Route::get('/{product}/show', 'show')->name('show');
    Route::get('/{product}/destroy', 'destroy')->name('destroy');
});