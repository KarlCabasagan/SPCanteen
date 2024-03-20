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

Route::get('/admindashboard', function () {
    return view('admindashboard');
});

Route::get('/adminproductlist', function () {
    return view('adminproductlist');
});

Route::get('/adminscanner', function () {
    return view('adminscanner');
});

Route::get('/test12', function () {
    return view('test12');
});





