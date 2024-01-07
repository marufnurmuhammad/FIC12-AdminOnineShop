<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.blank-page', ['type_menu' => '']);
});

Route::get('/login', function () {
    return view('pages.auth-login', ['type_menu' => '']);
});

Route::get('/register', function () {
    return view('pages.auth-register', ['type_menu' => '']);
});