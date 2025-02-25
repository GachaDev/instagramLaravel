<?php

use App\Http\Controllers\PostController;

Route::get('/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/{post}', [PostController::class, 'getPost'])->name('posts.get')->middleware('auth');
Route::post('/', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::post('/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
Route::post('/{post}/like', [PostController::class, 'like'])->name('posts.like')->middleware('auth');