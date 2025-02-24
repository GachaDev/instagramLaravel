<?php

use App\Http\Controllers\PostController;

Route::get('/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
