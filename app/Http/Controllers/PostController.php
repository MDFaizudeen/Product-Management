<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($request->only(['product', 'content']));
        return redirect()->route('posts.index')->with('success', 'Post created!');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted!');
    }
    public function trashed()
{
    $posts = Post::onlyTrashed()->get();
    return view('posts.trashed', compact('posts'));
}
}
