<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckIfOrderIsCompleted;
use App\Http\Middleware\CheckIfUserHasNotCompletedOrders;
use App\Http\Middleware\CheckIfUserHasProductInCart;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\CheckUserHasRole;
use App\Http\Middleware\EnsureNotVerified;
use App\Http\Middleware\IsVerified;
use App\Http\Middleware\MakeCookieForFadeOutTitle;
use App\Http\Middleware\PreventRegister;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->middleware([EnsureUserHasRole::class, CheckIfOrderIsCompleted::class, IsVerified::class])->name('home');

Route::get('/verification/verify/{id}/{hash}', function ($id, $hash) {
    $user = User::findOrFail($id);

    if (Hash::check($user->email, $hash)) {
        $user->markEmailAsVerified();
        return redirect('/')->with('status', 'Your email has been verified!');
    } else {
        return redirect('/')->with('error', 'Invalid verification link.');
    }
})->name('verification.verify');

Route::get('/after-intro', [IntroController:: class, 'afterIntro']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/setup', [UserController::class, 'setup']);

Route::get('/register', function () {
    return view('register');
})->middleware([PreventRegister::class]);

Route::post('/register', [UserController::class, 'register']);

Route::get('/verify', [UserController::class, 'sendVerificationEmail'])->middleware(CheckAuth::class, EnsureNotVerified::class);

Route::middleware(IsVerified::class)->group(function () {
    Route::get('/setup', function () {
        return view('setup');
    })->middleware(CheckUserHasRole::class);

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

                Route::get('/favorite', [FavoriteController::class, 'index'])->middleware(MakeCookieForFadeOutTitle::class);
                Route::get('/favorite/remove/{productId}', [FavoriteController::class, 'removeFavorite']);

                Route::get('/history', [OrderController::class, 'index3'])->middleware(MakeCookieForFadeOutTitle::class);

                Route::get('/profile', function () {
                    return view('user.profile');
                })->middleware(MakeCookieForFadeOutTitle::class)->name('profile');

                //Route for edit
                Route::middleware(['editUser'])->group(function () {
                    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
                    Route::post('/process.edit/{id}', [UserController::class, 'processEdit'])->name('process.edit');
                });
                
                Route::get('/cart', [CartController::class, 'index'])->middleware(MakeCookieForFadeOutTitle::class);
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

            
            Route::get('/product_list', [ProductController::class, 'adminIndex'])->middleware(MakeCookieForFadeOutTitle::class);
                Route::post('/addproduct', [ProductController::class, 'store']);
                Route::post('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
                Route::get('/products/{id}', [ProductController::class, 'show']);
                Route::post('/products/edit/{id}', [ProductController::class, 'edit']);

            Route::get('/order_list', [OrderController::class, 'index'])->middleware(MakeCookieForFadeOutTitle::class);
            Route::get('/order/get/details/{orderId}', [OrderController::class, 'getOrderDetails']);
            Route::get('/order/get/details/scan/{orderId}', [OrderController::class, 'getOrderDetailsScan']);
            Route::get('/order/get/product/{orderId}', [OrderController::class, 'getOrderProducts']);
            Route::get('/order/complete/{orderId}', [OrderController::class, 'completeOrder']);
            Route::get('/order/cancel/{orderId}', [OrderController::class, 'cancelOrder']);
            Route::get('/order/change/status/{orderId}', [OrderController::class, 'changeStatus']);
            
            Route::get('/transaction_history', [OrderController::class, 'index2'])->middleware(MakeCookieForFadeOutTitle::class);
            Route::get('/order/get/details2/{orderId}', [OrderController::class, 'getOrderDetails2']);
            
            Route::middleware(['superAdmin'])->group(function () {
                Route::get('/manage_user', [UserController::class, 'showUser'])->middleware(MakeCookieForFadeOutTitle::class);
                Route::get('/user/{id}', [UserController::class, 'show']);
                Route::post('/user/edit/{id}', [UserController::class, 'adminEdit']);
                Route::get('/user/delete/{id}', [UserController::class, 'delete']);
            });
        });
    });
});