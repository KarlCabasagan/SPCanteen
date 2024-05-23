<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\CheckUserHasRole;
use App\Http\Middleware\PreventRegister;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->middleware(EnsureUserHasRole::class);

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/setup', function () {
    return view('setup');
})->middleware(CheckUserHasRole::class);

Route::post('/setup', [UserController::class, 'setup']);

Route::get('/register', function () {
    return view('register');
})->middleware(PreventRegister::class);

Route::post('/register', [UserController::class, 'register']);

Route::middleware(['logged-in'])->group(function () {
    Route::middleware(['user'])->group(function () {
        Route::get('/product/category/{categoryId}', [ProductController::class, 'getProductsByCategory']);
        Route::get('/product/category/name/{categoryId}', [ProductController::class, 'getCategoryName']);
        Route::get('/cart/store/product/{product}', [CartController::class, 'store']);
        Route::get('/cart/show/product/inside', [CartController::class, 'show']);
        Route::get('/favorite/add/{product}', [ProductController::class, 'addDeleteFavorite']);
        Route::get('/favorite/show/{product}', [ProductController::class, 'showFavorite']);
        Route::get('/cart/store/single/product/{product}', [CartController::class, 'SingleStoreToCart']);
        Route::get('/product/search/{product}', [ProductController::class, 'searchProduct']);

        Route::get('/favorite', function () {
            return view('user.favorite');
        });
        Route::get('/history', function () {
            return view('user.history');
        });
        Route::get('/profile', function () {
            return view('user.profile');
        });
        Route::get('/cart', function () {
            return view('user.cart');
        });
        Route::get('/payment', function () {
            return view('user.payment');
        });
        Route::get('/qr-code', function () {
            return view('user.qr-code');
        });
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', function () {
            return view('admin.admin');
        });
        Route::get('/product_list', [ProductController::class, 'adminIndex']);
            Route::post('/addproduct', [ProductController::class, 'store']);
            Route::post('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

        Route::get('/order_list', function () {
            return view('admin.order_list');
        });
        Route::get('/transaction_history', function () {
            return view('admin.transaction_history');
        });
        Route::get('/order_scanner', function () {
            return view('admin.order_scanner');
        });
    });
});
