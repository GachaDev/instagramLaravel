<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('home');

Route::get('/login', function () {
    return view('login');
})->middleware('guest')->name('login');

Route::get("/register", function () {
    return view('register');
})->middleware('guest')->name('showRegister');

Route::prefix('users')->group(base_path('routes/users/users.php'));