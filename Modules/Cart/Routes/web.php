<?php

use Illuminate\Support\Facades\Route;
use Modules\Cart\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::prefix('cart')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/put', [CartController::class, 'put']);
    Route::post('/updateNumber/{productID}/{colorID}/{number}', [CartController::class, 'update']);
    Route::post('/deleteProduct/{id}', [CartController::class, 'destroy']);
    Route::get('/login', function () {
        return view('buystep1.index');
    })->middleware('guest.cart')->name('cart-login');
});
