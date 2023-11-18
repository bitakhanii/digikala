<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\EditorUploadController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('test', [TestController::class, 'index']);
Route::post('test', [TestController::class, 'store']);

Route::get('index', 'IndexController@index')->name('index');
Route::get('/', 'IndexController@index')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('product/{product}')->group(function () {
        Route::get('/comment/create', [CommentController::class, 'create'])->name('comment.create');
        Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
        Route::post('/question', [ProductController::class, 'storeQuestion'])->name('question.store');
    });
    Route::resource('/comment', CommentController::class)->only(['edit', 'update', 'destroy']);
    Route::post('/comment/sort/{product}', [CommentController::class, 'sort'])->name('comment.sort');
    Route::post('/comment/{comment}/reaction', [CommentController::class, 'reaction'])->name('comment.reaction');

    Route::middleware('empty.cart')->group(function () {
            Route::resource('/addresses', AddressController::class)->except(['create', 'show']);
            Route::post('/orders/set-address', [OrderController::class, 'setAddressSession']);
            Route::middleware('empty.address')->group(function () {
                Route::get('/cart-review', [OrderController::class, 'cartReview'])->name('cart-review');
                Route::post('/digikala-call', [OrderController::class, 'digikalaCall']);
                Route::get('/payment-info', [OrderController::class, 'paymentInfo'])->name('payment-info');
                Route::post('/orders/check-code', [OrderController::class, 'codeStatus']);
                Route::post('/orders/order-amount', [OrderController::class, 'setAmountSession']);
                Route::post('/payment/order', [PaymentController::class, 'index'])->name('payment.order');
            });
        });

    Route::post('/payment/callback', [PaymentController::class, 'callback']);
    Route::post('/profile/payment/order/{order}', [PaymentController::class, 'profilePayment'])->name('profile.payment.order');
});

Route::get('/search/{category:slug}', [SearchController::class, 'categorySearch'])->name('category.search');
Route::post('/search/doSearch/{category?}', [SearchController::class, 'doSearch']);
Route::get('/search', [SearchController::class, 'keywordSearch'])->name('keyword.search');

Route::get('/article/{article}', [IndexController::class, 'getArticle'])->name('article');

Route::get('/product/{product}', [ProductController::class, 'getProducts'])->name('product');
Route::post('/product/activeTab/{product}', [ProductController::class, 'activeTab']);

Route::post('/editor/upload', [EditorUploadController::class, 'upload'])->name('editor-upload');

/*Route::get('search', function () {
    $slug = request()->query('slug');
    // do something with $slug
});*/

require __DIR__ . '/auth.php';

