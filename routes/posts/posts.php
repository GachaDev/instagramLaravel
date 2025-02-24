<?php

use App\Http\Controllers\PostController;

Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/', [PostController::class, 'store'])->name('posts.store');
Route::post('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/{post}/like', [PostController::class, 'like'])->name('posts.like');