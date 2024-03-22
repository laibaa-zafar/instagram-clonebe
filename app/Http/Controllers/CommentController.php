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
    
        try {
            $comment = new Comment();
            $comment->postid = $request->postid;
            $comment->id = $request->id;
            $comment->content = $request->content;
    
            if ($comment->save()) {
                return response()->json([
                    'message' => 'Comment saved successfully',
                    'comment_id' => $comment->id // Return just the comment ID
                ], 201);
            } else {
                throw new \Exception('Failed to save comment');
            }
        } catch (\Exception $e) {
            // Log the error message for debugging
            Log::error('Error saving comment: '.$e->getMessage());
    
            return response()->json([
                'message' => 'Error occurred while saving comment',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function getComments()
    {
        try {
            $comments = Comment::all();
            return response()->json([
                'message' => 'Comments retrieved successfully',
                'comments' => $comments
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}