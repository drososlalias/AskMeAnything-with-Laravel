<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout' , [AuthController::class , 'logout']);
Route::get('/sessionStatus', [AuthController::class, 'sessionStatus'])->middleware('auth:sanctum');
Route::get('/user-statistics' , [UserController::class, 'getUserStatistics']);

Route::get('{any?}' , function(){
    return view('app');
})->where('any','.*');

