<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckIfOrderIsCompleted;
use App\Http\Middleware\CheckIfUserHasNotCompletedOrders;
use App\Http\Middleware\CheckIfUserHasProductInCart;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\CheckUserHasRole;
use App\Http\Middleware\PreventRegister;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->middleware([EnsureUserHasRole::class, CheckIfOrderIsCompleted::class]);

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
        Route::middleware(['noPendingOrder'])->group(function () {
            Route::get('/product/category/{categoryId}', [ProductController::class, 'getProductsByCategory']);
            Route::get('/product/category/name/{categoryId}', [ProductController::class, 'getCategoryName']);
            Route::get('/cart/store/product/{product}', [CartController::class, 'store']);
            Route::get('/cart/show/product/inside', [CartController::class, 'show']);
            Route::get('/favorite/add/{product}', [FavoriteController::class, 'addDeleteFavorite']);
            Route::get('/favorite/show/{product}', [FavoriteController::class, 'showFavorite']);
            Route::get('/cart/store/single/product/{product}', [CartController::class, 'SingleStoreToCart']);
            Route::get('/product/search/{product}', [ProductController::class, 'searchProduct']);

            Route::get('/favorite', [FavoriteController::class, 'index']);
            Route::get('/favorite/remove/{productId}', [FavoriteController::class, 'removeFavorite']);

            Route::get('/history', function () {
                return view('user.history');
            });
            Route::get('/profile', function () {
                return view('user.profile');
            })->name('profile');

            //Route for edit
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::post('/process.edit/{id}', [UserController::class, 'processEdit'])->name('process.edit');

            
            Route::get('/cart', [CartController::class, 'index']);
            Route::get('/cart/delete/{cartId}', [CartController::class, 'destroy']);
            Route::get('/cart/get/total/quantity', [CartController::class, 'getTotalQuantity']);
            Route::get('/cart/get/total/price', [CartController::class, 'getTotalPrice']);
            Route::get('/cart/quantity/add/{cartId}', [CartController::class, 'addQuantity']);
            Route::get('/cart/quantity/minus/{cartId}', [CartController::class, 'minusQuantity']);

            Route::get('/payment', [OrderController::class, 'paymentPage'])->middleware(CheckIfUserHasProductInCart::class);

            Route::post('/order/store', [OrderController::class, 'store']);
        });
        Route::get('/qr-code', [OrderController::class, 'getOrderId'])->middleware(CheckIfUserHasNotCompletedOrders::class);
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/administrator', [OrderController::class, 'getStatistics']);
        Route::get('/api/chart/data', [OrderController::class, 'getChartData']);

        
        Route::get('/product_list', [ProductController::class, 'adminIndex']);
            Route::post('/addproduct', [ProductController::class, 'store']);
            Route::post('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
            Route::get('/products/{id}', [ProductController::class, 'show']);
            Route::post('/products/edit/{id}', [ProductController::class, 'edit']);

        Route::get('/order_list', [OrderController::class, 'index']);
        Route::get('/order/get/details/{orderId}', [OrderController::class, 'getOrderDetails']);
        Route::get('/order/get/details/scan/{orderId}', [OrderController::class, 'getOrderDetailsScan']);
        Route::get('/order/get/product/{orderId}', [OrderController::class, 'getOrderProducts']);
        Route::get('/order/complete/{orderId}', [OrderController::class, 'completeOrder']);
        Route::get('/order/cancel/{orderId}', [OrderController::class, 'cancelOrder']);
        Route::get('/order/change/status/{orderId}', [OrderController::class, 'changeStatus']);
        
        Route::get('/transaction_history', [OrderController::class, 'index2']);
        Route::get('/order/get/details2/{orderId}', [OrderController::class, 'getOrderDetails2']);

        Route::get('/manage_user', [UserController::class, 'showUser']);
    });
});
