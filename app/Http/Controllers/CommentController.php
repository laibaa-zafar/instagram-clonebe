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
                    'message' => 'Comment successful',
                    'comment' => $comment
                ], 201);
            } else {
                throw new \Exception('Failed to save comment');
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}