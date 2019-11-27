@extends('layouts.app')

@section('content')
<div class="card-header">編集ページ</div>
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

            <form action="{{ route('users.update', $id = Auth::id()) }}" method="POST" enctype='multipart/form-data'>
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

              <div class="form-group">
                <label for="exampleFormControlFile1">PROFILE IMAGE</label>
                <img src="{{ asset('storage/image/'.Auth::user()->user_img) }}" alt="ユーザーの画像" class="img-thumbnail">
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="user_img">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1"><i class="fas fa-user-alt"></i>　YOUR NAME</label>
                <input type="text" class="form-control" name='name' value='{{ Auth::user()->name }}'>
              </div>

              <div class="form-group">
                <label for="comment"><i class="fas fa-id-badge"></i>　SELF INTRODUCTION</label>
                <textarea class="form-control" rows="3" name="introduction">{{ Auth::user()->introduction }}</textarea>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1"><i class="fas fa-male"></i><i class="fas fa-female"></i>　GENDER</label>
                  <select class="form-control" name="sex">
                      <option value="0" selected="">選択する</option>
                      <option value="1">男性</option>
                      <option value="2">女性</option>
                  </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1"><i class="fas fa-dumbbell"></i>　良く利用する施設(GYM)</label>
                <input type="text" class="form-control" placeholder="ANYTIME FITNESS" name='gym' value='{{ Auth::user()->gym }}'>
              </div>

              <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div class="row justify-content-center">
              <button type="submit" class="lower-btn col-md-3 mr-md-3 btn btn-success">SAVE CHANGES</button>
              <input type="button" onclick="history.back()" value="BACK" class="col-md-3 btn btn-primary">
            </div>
            </form>
        </div>
    </div>
 </div>

@endsection
