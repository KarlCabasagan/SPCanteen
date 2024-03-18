<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('loginpage');  // welcome.blade.php
});

Route::get('/forgotpassword', function () {
    return view('forgotPassword');
});

Route::get('/registerpage', function () {
    return view('registerpage');
});

Route::get('/setupprofile', function () {
    return view('setupprofile');
});

Route::get('/favorites', function () {
    return view('favorite');
});

