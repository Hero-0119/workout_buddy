@extends('layouts.app')

@section('content')
<div class="card-header  bg-dark text-white-50 event-header">CHATS</div>
<div class="card-body row">
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


@foreach($comments as $comment)
    <div class="card col-md-12">
        <div class="card-body">
        @if($comment->user->user_img != null)
            <img src="{{ asset('storage/image/'.$comment->user->user_img) }}" class="img-thumbnail rounded-circle" width="100px" height="100px">
        @endif
            <span class="card-title ml-3">
                内容: {{ $comment->content }}
            </span>
            <p class="card-title mt-2 ml-">
                投稿者: {{ $comment->user->name }}
            </p>
            <p class="card-title float-right">
                {{ $comment->created_at }}
            </p>

        @if(Auth::id() == $comment->user_id)

            <form action="{{ route('posts.comments.destroy', [$comment->post_id, $comment->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="id" value="{{ $comment->id }}">
                <input type="submit" value="削除" name="delete" class="btn btn-danger">
            </form>

        @endif
        </div>
    </div>
@endforeach
</div>
<a href="{{ route('posts.comments.create', ['id' => $id]) }}" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>投稿する</a>
@endsection
