<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout' , [AuthController::class , 'logout']);
Route::get('/sessionStatus', [AuthController::class, 'sessionStatus'])->middleware('auth:sanctum');

Route::get('{any?}' , function(){
    return view('app');
})->where('any','.*');

