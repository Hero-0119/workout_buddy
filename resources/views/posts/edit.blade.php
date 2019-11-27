@extends('layouts.app')

@section('content')
<div class="card-header bg-dark text-white-50 event-header">EDIT</div>
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

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype='multipart/form-data'>
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

              <div class="form-group">
                <label for="exampleFormControlFile1"><i class="fas fa-image"></i>イメージ画像*</label>
                <img src="{{ asset('storage/image/'.$post->gym_img) }}" alt="施設の画像" class="w-100 h-75">
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gym_img">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1"><i class="fas fa-dumbbell"></i>タイトル*</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name='title' value='{{ $post->title }}'>
              </div>

              <div class="form-group">
                <label for="comment"><i class="fas fa-file-alt"></i>イベントの趣旨(140文字以内)*</label>
                <textarea class="form-control" rows="3" id="about_group" name="about_group">{{ $post->about_group }}</textarea>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1"><i class="fas fa-map-marker-alt"></i>施設名*</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="gym_id">
                      <option value="{{ $post->gym->id }}">{{ $post->gym->gym_name }}</option>
                      @foreach($gyms as $gym)
                      <option value="{{ $gym->id }}">{{ $gym->gym_name }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-sm-12 px-0"><i class="fas fa-calendar-alt"></i>イベント開催日時*</label>
                <div class="create-date col-sm-4 pl-0">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                            <label for="datetimepicker1" class="pt-2 pr-2">日付:</label>
                            <input type="date" class="form-control datetimepicker-input" data-target="#datetimepicker" name="event_date" value="{{ $post->event_date }}">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="create-date col-sm-4">
                    <div class="form-group">
                        <div class="input-group date">
                            <label for="start_time" class="pt-2 pr-2">開始時間:</label>
                            <input type="time" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="start_time" value="{{ $post->start_time }}">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="create-date col-sm-4 pr-0">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                            <label for="datetimepicker2" class="pt-2 pr-2">終了時間:</label>
                            <input type="time" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="end_time" value="{{ $post->end_time }}">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">料金設定</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="￥0" name='fee' value=''>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">募集人数</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="number_limit">
                      <option value="0">指定無し</option>
                      <option value="1">1名</option>
                      <option value="2">2名</option>
                      <option value="3">3名</option>
                      <option value="4">4名</option>
                      <option value="5">5名</option>
                      <option value="6">6名</option>
                  </select>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">性別の限定</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="sex_limit">
                      <option value="0">限定無し</option>
                      <option value="1">男性のみ</option>
                      <option value="2">女性のみ</option>
                  </select>
              </div>

              <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <div class="row justify-content-center">
              <button type="submit" class="col-md-3 lower-btn mr-md-3 btn btn-success">SAVE CHANGES</button>

              <input type="button" onclick="history.back()" value="BACK" class="col-md-3 btn btn-primary">
            </div>
            </form>
        </div>
    </div>
 </div>

@endsection
