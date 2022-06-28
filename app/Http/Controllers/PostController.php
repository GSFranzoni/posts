<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('store', 'destroy');
    }

    public function index()
    {
        $posts = Post::with('user', 'likes')->latest()->paginate(5);
        return view('pages.posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('pages.posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
