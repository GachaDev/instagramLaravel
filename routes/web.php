<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('showLogin');

Route::get("/register", function () {
    return view('register');
})->name('showRegister');

Route::prefix('users')->group(base_path('routes/users/users.php'));