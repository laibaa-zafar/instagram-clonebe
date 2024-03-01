<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikesController extends Controller
{
    public function likePost(Request $request)
{
    $like = new Like();
    $like->user_id = auth()->id();
    $like->post_id = $request->post_id;
    $like->save();

    return response()->json(['message' => 'Post liked successfully']);
}
}
