<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'getHome'])->middleware('auth')->name('home');

Route::get('/login', function () {
    return view('login');
})->middleware('guest')->name('login');

Route::get("/register", function () {
    return view('register');
})->middleware('guest')->name('showRegister');

Route::prefix('users')->group(base_path('routes/users/users.php'));
Route::prefix('posts')->group(base_path('routes/posts/posts.php'));