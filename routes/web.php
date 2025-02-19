<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('showLogin');

Route::get("/register", function () {
    return view('welcome');
})->name('showRegister');

Route::prefix('users')->group(base_path('routes/users/users.php'));