@extends('layouts.app')

@section('content')
<div class="card-header">イベントという何か名称</div>
<div class="card-body row">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @foreach($posts as $post)
        <div class="card col-md-3">
            <div class="card-body">
                <img src="{{ asset('storage/image/'.$post->gym_img) }}" alt="施設の画像" class="w-100 h-50">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h5 class="card-title">
                    施設名:{{ $post->gym->gym_name}}
                </h5>

                <p class="card-text">{{ $post->about_group }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
