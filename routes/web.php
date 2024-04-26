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

Route::get('/register', function () {
    return view('register');
})->middleware(PreventRegister::class);

Route::post('/register', [UserController::class, 'register']);

Route::middleware(['logged-in'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', function () {
            return view('admin');
        });
    });
});
