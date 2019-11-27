@extends('layouts.app')

@section('content')
<div class="card-header  bg-dark text-white-50 event-header">チャット欄への投稿</div>

<div class="card-body">
  @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
  @endif
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <form action="{{ route('posts.comments.store', ['id' => '$post_id']) }}" method="POST">
            {{ csrf_field() }}

              <div class="form-group">
                <label for="content">Message:</label>
                <textarea class="form-control" rows="3" name="content"></textarea>
              </div>

              <input type="hidden" name="user_id" value="{{ Auth::id() }}">
              <input type="hidden" name="post_id" value="{{ $id }}">

              <button type="submit" class="btn btn-primary">SEND</button>
            </form>
        </div>
    </div>
 </div>

@endsection
