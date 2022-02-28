<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class,'index']);
Route::get('/posts/{post}', [PostController::class,'show']);
Route::post('/posts', [PostController::class,'store']);
Route::put('/posts/{post}', [PostController::class,'update']);
Route::delete('/posts/{post}', [PostController::class,'destroy']);

Route::post('/posts/{post}/comment', [CommentController::class,'store']);
Route::delete('/posts/{comment}/comment', [CommentController::class,'destroy']);

Route::get('/stats', [PostController::class,'getSiteStatistics']);
Route::get('/keywords', [PostController::class,'getKeywordStatistics']);