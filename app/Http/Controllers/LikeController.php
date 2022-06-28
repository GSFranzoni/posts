<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $user = $request->user();
        if ($post->likedBy($user)) {
            return response(null, 409);
        }
        $post->likes()->create([
            'user_id' => $user->id
        ]);
        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
