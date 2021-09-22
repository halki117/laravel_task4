@extends('layouts.app')

@section('menu')
  <li class="nav-item">
    <a href="" class="nav-link">みんなの投稿</a>
  </li>
  <li class="nav-item">
    <a href="" class="nav-link">投稿を作成</a>
  </li>
@endsection

@section('content')
    <form action="{{ route('posts.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">タイトル</label>
        <input name="title" class="form-control">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">コンテンツ</label>
        <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-success">新規投稿</button>
    </form>
@endsection
