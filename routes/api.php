<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('signup', [UserController::class, 'signup']);
Route::post('login', [UserController::class, 'login']);
Route::post('addPost', [PostController::class, 'addPost']);