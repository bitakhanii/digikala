<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::resource('/user', UserController::class)->except('show');
