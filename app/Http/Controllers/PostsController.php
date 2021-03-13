<?php

namespace App\Http\Controllers;
use App\Models\Post;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }
}
