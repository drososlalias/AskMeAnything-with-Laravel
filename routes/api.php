<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Protected Routes - Post related
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('posts', PostController::class);
    Route::post('posts/{post}/comment', [CommentController::class,'store']);
    Route::delete('posts/{comment}/comment', [CommentController::class,'destroy']);
    Route::get('comments/{post}', [CommentController::class, 'getCommentsPerPost']);
});

// Statistics routes
Route::get('/stats', [PostController::class,'getSiteStatistics']);
Route::get('/keywords', [PostController::class,'getKeywordStatistics']);
