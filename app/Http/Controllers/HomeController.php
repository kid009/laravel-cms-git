<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags'])->latest()->paginate(10);

        return view('home.index', [
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('home.show', [
            'post' => $post,
        ]);
    }

    public function category($id)
    {
        $posts = Post::where('category_id', $id)->paginate(10);

        return view('home.index', [
            'posts' => $posts,
        ]);
    }

    public function tag($id)
    {
        $tag = Tag::findOrFail($id);

        $posts = $tag->posts()->with(['category', 'tags'])->paginate(10);

        return view('home.index', [
            'posts' => $posts,
        ]);
    }
}
