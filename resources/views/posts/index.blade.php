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

  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif

  @foreach ($posts as $post)

    <div class="row justify-content-center text-center">
      <div class="post mb-1 p-5 w-100">
        <h2 class="title">{{ $post->title }}</h2>
        <p class="content">{{ $post->content }}</p>
        <hr >
        <div class="post_user justify-content-center d-flex">
          <p class="mr-2 mt-3">投稿者: {{ $post->user->name }}</p>
          @if ($post->user->id === Auth::id())
            <form action="{{ route('posts.edit', $post->id) }}" method="get" class="mr-2">
              @csrf
              <input  type="submit" class="btn btn-primary py-3" value="編集する">
            </form>
            <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="mr-2">
              @csrf
              {{ method_field('delete') }}
              <input  type="submit" class="btn btn-danger py-3" value="削除する" onclick="return confirm('削除しますか？')">
            </form>
            
          @endif
          
          {{-- いいね済みかを判断するisLikedメソッドをPostモデルに設定している --}}
          @if ($post->isLiked(Auth::user()))
            <form action="{{ route('unlikes', $post) }}" method="POST">
              @csrf
              {{ method_field('delete') }}
              <button type="submit">
                <i class="fas fa-heart pt-1 mt-3">x{{ $post->likes->count() }}</i>
              </button>
            </form>
          @else
            <form action="{{ route('likes', $post) }}" method="POST">
              @csrf
              <button type="submit">
                <i class="far fa-heart pt-1 mt-3">x{{ $post->likes->count() }}</i>
              </button>
            </form>
          @endif
        </div>
      </div>
    </div>
    <hr >
  @endforeach
@endsection

<style>
  button{
    border: none;
    background: transparent;
  }
</style>
