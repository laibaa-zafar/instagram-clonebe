<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
        public function likePost(Request $request)
{
    error_log($request);
    try {
        $existingLike = Like::where('id', $request->id)->where('postid', $request->post)->first();
        if ($existingLike) {
            return response()->json(['message' => 'Like already exists'], 400);
        }
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred'], 500);
    }
}

    // return "hello";
    }


    // public function unlike(Request $request, $postid)
    // {
    //     $post = Post::findOrFail($postid);
    //     $username = $request->input('username');

    //     $like = Like::where('post_id', $postid)
    //         ->where('username', $username)
    //         ->first();

    //     if ($like) {
    //         $like->delete();
    //     }
    //     return response()->json(['message' => 'Post unliked successfully']);
    // }
    // public function likePost (Request $request)
//     {
//     error_log($request);
//     try{
//         $existinglike = Like::where('id', $request->id)->where('postid', $request->post)
//     }
//     {
//         return "hello";
//     }
// }