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
    // Check if the user has already liked the post
    $existingLike = Like::where('postid', $request->postid)
                         ->where('username', $request->username)
                         ->first();

    if ($existingLike) {
        return response()->json(['message' => 'User has already liked the post.'], 400);
    }

    // Insert a new like
    $like = new Like();
    $like->postid = $request->postid;
    $like->username = $request->username;
    $like->save();

    return response()->json(['message' => 'Like added successfully.'], 200);
}


public function unlikePost(Request $request)
{
    try {
        $postid = $request->input('postid');
        $username = $request->input('username');

        if (!$postid || !$username) {
            return response()->json(['message' => 'Missing required fields'], 400);
        }

        $existingLike = Like::where('postid', $postid)
                            ->where('username', $username)
                            ->first();

        if (!$existingLike) {
            return response()->json(['message' => 'Post was not liked previously.'], 200);
        }

        $existingLike->delete();

        return response()->json(['message' => 'Post unliked successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}


public function likeStatus (Request $request)
{
    try {
        $postid = $request->input('postid');
        if (!$postid)
        {
            return response()->json(['message' => 'Missing required field: postid'], 400);
        }
        $totalLikes = Like::where('postid', $postid)->count();
        return response()->json(['total_likes' => $totalLikes], 200);
    } 
    catch (\Exception $e) 
    {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}
    }
    