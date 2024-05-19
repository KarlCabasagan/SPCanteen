<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\CheckUserHasRole;
use App\Http\Middleware\PreventRegister;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware(EnsureUserHasRole::class);

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
        Route::get('/product_list', function () {
            return view('admin.product_list');
        });
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
