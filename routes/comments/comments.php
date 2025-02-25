<?php

use App\Http\Controllers\CommentController;

Route::post('/', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
