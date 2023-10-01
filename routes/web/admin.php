<?php

use App\Http\Controllers\Admin\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TestController::class, 'index'])->name('admin');
