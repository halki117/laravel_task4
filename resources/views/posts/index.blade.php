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
  <div class="row justify-content-center text-center">
    <div class="post mb-1 p-5 w-100">
      <h2 class="title">title</h2>
      <p class="content">content</p>
      <hr >
      <div class="post_user justify-content-center d-flex">
        <p class="mr-2">投稿者: halki</p>
        <i class="far fa-heart pt-1">x1</i>
      </div>
    </div>
  </div>
  <hr >
@endsection
