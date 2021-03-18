<?php

namespace App\Http\Controllers;
use App\Models\Post;
use \Illuminate\Support\Str;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }
}
