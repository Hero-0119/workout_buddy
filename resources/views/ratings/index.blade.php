@extends('layouts.app')

@section('content')
<div class="card-header bg-dark text-white-50 event-header">REVIEW</div>
<div class="card-body row event-contents py-4">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@if(isset($joinposts))
    @foreach($posts as $post)
        @foreach($joinposts as $joinpost)
        @if($post->id == $joinpost->post_id)
        <a href="{{ route('posts.show', $post->id) }}" class="card col-md-5 col-lg-3 event grayscale">
            <div class="card-body text-dark px-0 pb-0">
                <img src="{{ asset('storage/image/'.$post->gym_img) }}" alt="施設の画像" class="event-img">
                <p class="card-title mb-1">
                    <i class="fas fa-user-alt"></i>  {{ $post->host->name }}
                </p>
                <p class="card-title mb-1">
                    <i class="fas fa-dumbbell"></i>  {{ $post->title }}
                </p>
                <p class="card-title mb-1">
                    <i class="fa fa-clock"></i>  {{ Carbon\Carbon::parse($post->start_time)->format('H:i') }}~{{ Carbon\Carbon::parse($post->end_time)->format('H:i') }}
                </p>
                <p class="card-title mb-1">
                    <i class="fas fa-map-marker-alt"></i>  {{ $post->gym->gym_name}}
                </p>
            </div>
        </a>
        @endif
        @endforeach
    @endforeach
@else
    <p>”まだ評価できるイベントがありません。”</p>
@endif
</div>
@endsection
