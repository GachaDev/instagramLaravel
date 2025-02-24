<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/login', [UserController::class, 'doLogin'])->name('user.doLogin');
Route::post('/register', [UserController::class, 'doRegister'])->name('user.doRegister');
Route::post('/logout', [UserController::class, 'doLogout'])->name('user.doLogout');
Route::post('/destroyAccount', [UserController::class, 'destroyAccount'])->name('user.destroyAccount');