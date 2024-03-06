<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'postid' => 'required',
            'content' => 'required|string|max:255',
        ]);

        $user = $request->user();
        if (!$user) {
            return response()->json([
                'message' => 'User not authenticated'
            ], 401);
        }

        $comment = new Comment();
        $comment->postid = $request->postid;
        $comment->user_id = $user->id; // Assuming user_id is the foreign key for the user's ID
        $comment->content = $request->content;

        if ($comment->save()) {
            return response()->json([
                'message' => 'Comment successful',
                'comment' => $comment
            ], 201);
        } else {
            return response()->json([
                'message' => 'Error occurred'
            ], 500);
        }
    }
}
