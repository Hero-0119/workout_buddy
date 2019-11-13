@extends('layouts.app')

@section('content')
<div class="card-header">イベント詳細</div>
<div class="card-body row">
  @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
  @endif
        <div class="card-body">
            <img src="{{ asset('storage/image/'.$post->gym_img) }}" alt="施設の画像" class="w-100 h-75">

            <h5 class="card-title">イベント名:　{{ $post->title }}</h5>
            <h5 class="card-title">
                施設名:　{{ $post->gym->gym_name }}
            </h5>

            <h5 class="card-text">イベントについて:　{{ $post->about_group }}</h5>
            <h5 class="card-text">開催日:　{{ $post->event_date }}</h5>
            <h5 class="card-text">開始時刻:　{{ $post->start_time }}</h5>
            <h5 class="card-text">終了時刻:　{{ $post->end_time }}</h5>
            <h5 class="card-title">
                人数の指定:　{{ $post->number_limit }}
            </h5>
            <h5 class="card-title">
                性別の限定:　{{ $post->sex_limit }}
            </h5>
        </div>
 </div>

<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">編集</a>

<input type="button" onclick="history.back()" value="戻る" class="btn btn-success">

 <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="submit" value="削除" name="delete" class="btn btn-danger">
</form>

@endsection
