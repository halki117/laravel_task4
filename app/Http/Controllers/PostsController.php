<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Auth\Middleware\RequirePassword;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(PostRequest $request) {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();
        return redirect(route('posts.index'));
    }

    public function edit($id) {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, $id) {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->update();
        return redirect(route('posts.index'));
    }
}
