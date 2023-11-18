<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::resource('/user', UserController::class)->except('show');
Route::resource('/product', ProductController::class)->except('show');
Route::post('/product/sub-category/{category}', [ProductController::class, 'loadSubCategory']);
Route::post('/brand/create', [ProductController::class, 'createBrand'])->name('create.brand');
Route::post('/color/create', [ProductController::class, 'createColor'])->name('create.color');
Route::get('/product/{product}/gallery', [ProductController::class, 'gallery'])->name('product.gallery');
Route::post('/product/{product}/gallery', [ProductController::class, 'storeGallery']);
Route::delete('/product/{product}/productImage/{image}', [ProductController::class, 'deleteImage']);
Route::get('/product/{product}/review', [ProductController::class, 'review'])->name('product.review');
Route::post('/product/{product}/review', [ProductController::class, 'storeReview']);
Route::patch('/product/review/{review}', [ProductController::class, 'editReview']);
Route::delete('/product/{product}/review/{review}', [ProductController::class, 'deleteReview']);
Route::patch('/product/{product}/special', [ProductController::class, 'makeSpecial'])->name('product.make-special');
Route::patch('/product/{product}/remove-special', [ProductController::class, 'removeSpecial'])->name('product.remove-special');
