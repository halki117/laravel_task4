@extends('layouts.app')

@section('menu')
  <li class="nav-item">
    <a href="" class="nav-link">みんなの投稿</a>
  </li>
  <li class="nav-item">
    <a href="{{ route('posts.create') }}" class="nav-link">投稿を作成</a>
  </li>
@endsection

@section('content')
  @foreach ($posts as $post)
    <div class="row justify-content-center text-center">
      <div class="post mb-1 p-5 w-100">
        <h2 class="title">{{ $post->title }}</h2>
        <p class="content">{{ $post->content }}</p>
        <hr >
        <div class="post_user justify-content-center d-flex">
          <p class="mr-2">投稿者: {{ $post->user->name }}</p>
          <i class="far fa-heart pt-1">x1</i>
        </div>
      </div>
    </div>
    <hr >
  @endforeach
@endsection
