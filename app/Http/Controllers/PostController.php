<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
// use App\Models\Posts;


class PostController extends Controller
{
    function addPost( Request $req)
    {
        $post= new Post;
        $post->name= $req->input('name');
        $post->description= $req->input('description');
        $post->file_path= $req->file('file_path')->store('posts');
        $post->save( );
        return $post;
    }
}
