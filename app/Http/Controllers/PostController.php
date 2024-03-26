<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function addPost(Request $req)
    {
        try {
            $post = new Post;
            $post->name = $req->input('name');
            $post->description = $req->input('description');
            $post->file_path = $req->file('file_path')->store('posts');
            $post->id = $req->input('id');

            $post->save();

            return response()->json(['message' => 'Post added successfully', 'post' => $post]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add post', 'error' => $e->getMessage()], 500);
        }
    }

    public function index($id = null)
    {
        if ($id) {
            $posts = Post::where('id', $id)->get();
        } else {
            $posts = Post::all();
        }
    
        return response()->json(['message' => 'Posts retrieved successfully', 'posts' => $posts]);
    }
    
    
}
