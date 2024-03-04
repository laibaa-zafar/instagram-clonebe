<?php

use App\Http\Controllers\LikeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signup', [UserController::class, 'signup']);
Route::post('login', [UserController::class, 'login']);
Route::post('addPost', [PostController::class, 'addPost']);
Route::get('getPosts', [PostController::class, 'getPosts']);
Route::post('/likePost/{postid}', [LikeController::class, 'likePost']);
Route::delete('/unlikePost/{postid}', [LikeController::class, 'unlikePost']);
