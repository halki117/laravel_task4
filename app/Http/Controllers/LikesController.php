<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;


class LikesController extends Controller
{
    public function store(Post $post) {
        var_dump($post);
        // 最初にdetachを使うことで、一つの投稿に２回以上いいねできない様にする。
        $post->likes()->detach(Auth::id());
        $post->likes()->attach(Auth::id());
        return redirect(route('posts.index'));
    }

    public function destroy(Post $post) {
        $post->likes()->detach(Auth::id());
        return redirect(route('posts.index'));
    }
}
