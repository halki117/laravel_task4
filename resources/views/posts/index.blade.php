@extends('layouts.app')

@section('menu')
  <li class="nav-item">
    <a href="" class="nav-link">みんなの投稿</a>
  </li>
  <li class="nav-item">
    <a href="{{ route('posts.create') }}" class="nav-link">投稿を作成</a>
  </li>
  <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
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
          <p class="mr-2 mt-3">投稿者: {{ $post->user->name }}</p>
          @if ($post->user->id === Auth::id())
            <button class="btn btn-primary mr-2" onclick="location.href='{{ route('posts.edit', $post->id) }}' ">編集する</button>
            <button class="btn btn-danger mr-2">削除する</button>
          @endif
          <i class="far fa-heart pt-1 mt-3">x1</i>
        </div>
      </div>
    </div>
    <hr >
  @endforeach
@endsection
