<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Protected Routes - Post related
Route::middleware('auth:sanctum')->group(function(){
    Route::resource('posts',PostController::class); 
    Route::post('posts/{post}/comment', [CommentController::class,'store']);
    Route::delete('posts/{comment}/comment', [CommentController::class,'destroy']);
    Route::post('logout' , [AuthController::class , 'logout']);
});

// Auth routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Statistics routes
Route::get('/stats', [PostController::class,'getSiteStatistics']);
Route::get('/keywords', [PostController::class,'getKeywordStatistics']);