<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('signup', [UserController::class, 'signup']);
Route::post('login', [UserController::class, 'login']);
Route::post('addPost', [PostController::class, 'addPost']);
Route::get('index', [PostController::class, 'index']);
Route::post('likePost', [LikesController::class, 'likePost']);
Route::post('store', [CommentController::class, 'store']);
