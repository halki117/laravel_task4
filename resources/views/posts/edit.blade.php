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
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
      <li>{{$error}}</li>
    </div>
    @endforeach
    
    <form action="{{ route('posts.update', $post->id) }}" method="post">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">タイトル</label>
        <input name="title" class="form-control" value="{{ $post->title }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">コンテンツ</label>
        <textarea name="content" id="" cols="30" rows="10" class="form-control" >{{ $post->content }}</textarea>
      </div>
      {{ method_field('put') }}
      <button type="submit" class="btn btn-success">投稿編集</button>
    </form>
@endsection