<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'categories.name as category_name')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(3);
        return view('frontend.index', compact('posts'));
    }
    public function show($post_slug)
    {
        $post = Post::join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'categories.name as category_name')
            ->where('posts.slug', $post_slug)->first();
        return view('frontend.show', compact('post'));
    }
}
