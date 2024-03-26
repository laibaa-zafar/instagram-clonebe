<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signup', [UserController::class, 'signup']);
Route::post('login', [UserController::class, 'login']);
Route::get('getUser', [UserController::class, 'getUser']);
Route::get('getUserPosts', [UserController::class, 'getUserPosts']);
Route::post('addPost', [PostController::class, 'addPost']);
// Route::post('profileController', [ProfileController::class, 'profileController']);
Route::get('index', [PostController::class, 'index']);
Route::get('index/{userId}', [PostController::class, 'index']);
Route::post('likePost', [LikesController::class, 'likePost']);
Route::delete('unlikePost', [LikesController::class, 'unlikePost']);
Route::get('likeStatus', [LikesController::class, 'likeStatus']);
Route::post('store', [CommentController::class, 'store']);
Route::get('getComments', [CommentController::class, 'getComments']);
