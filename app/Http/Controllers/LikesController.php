<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post; 

class LikesController extends Controller
{
    // public function like(Request $request, $postid)
    // {
    //     $post = Post::findOrFail($postid);
    //     $username = $request->input('username');

    //     $like = Like::where('post_id', $postid)
    //         ->where('username', $username)
    //         ->first();

    //     if (!$like) {
    //         $like = new Like();
    //         $like->post_id = $postid;
    //         $like->username = $username;
    //         $like->save();
    //     }

    //     return response()->json(['message' => 'Post liked']);
    // }

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
