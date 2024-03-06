<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    public function likePost()
    {
        $post = Post::findOrFail($postid);
        $username = $request->input('username');
        $like = Like::where('post_id', $postid)
            ->where('username', $username)
            ->first();
        if (!$like) {
            $like = new Like();
            $like->post_id = $postid; 
            $like->username = $username;
            $like->save();
        }
        return response()->json(['message' => 'Post liked']);
    return "hello";
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
}