<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/login', [UserController::class, 'doLogin'])->name('user.doLogin')->middleware('guest');
Route::post('/register', [UserController::class, 'doRegister'])->name('user.doRegister')->middleware('guest');
Route::post('/logout', [UserController::class, 'doLogout'])->name('user.doLogout')->middleware('auth');
Route::post('/destroyAccount', [UserController::class, 'destroyAccount'])->name('user.destroyAccount')->middleware('auth');