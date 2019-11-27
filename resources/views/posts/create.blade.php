@extends('layouts.app')

@section('content')
<div class="card-header bg-dark text-white-50 event-header">CREATE EVENT</div>

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

            <form action="{{ route('posts.store') }}" method="POST" enctype='multipart/form-data'>
            {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleFormControlFile1"><i class="fas fa-image"></i>イメージ画像*</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gym_img">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1"><i class="fas fa-dumbbell"></i>タイトル*</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name='title'>
              </div>

              <div class="form-group">
                <label for="comment"><i class="fas fa-file-alt"></i>イベントの趣旨(140文字以内)*</label>
                <textarea class="form-control" rows="3" id="about_group" name="about_group"></textarea>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1"><i class="fas fa-map-marker-alt"></i>施設名*</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="gym_id">
                      <option value="">選択する</option>
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
                            <input type="date" class="form-control datetimepicker-input" data-target="#datetimepicker" name="event_date">
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
                            <input type="time" class="form-control datetimepicker-input" name="start_time" step="900">
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
                            <input type="time" class="form-control datetimepicker-input" name="end_time"  step="900">
                            <div class="input-group-append" >
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">料金設定</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="￥0" name='fee'>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1"><i class="fas fa-user-alt-slash"></i>募集人数</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="number_limit">
                      <option value="100" selected="">指定無し</option>
                      <option value="1">1名</option>
                      <option value="2">2名</option>
                      <option value="3">3名</option>
                      <option value="4">4名</option>
                      <option value="5">5名</option>
                      <option value="6">6名</option>
                      <option value="7">7名</option>
                      <option value="8">8名</option>
                      <option value="9">9名</option>
                      <option value="10">10名</option>
                  </select>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1"><i class="fas fa-male"></i><i class="fas fa-female"></i>性別の限定</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="sex_limit">
                      <option value="0" selected="">限定無し</option>
                      <option value="1">男性のみ</option>
                      <option value="2">女性のみ</option>
                  </select>
              </div>

              <input type="hidden" name="host_id" value="{{ Auth::id() }}">
            <div class="row justify-content-center">
              <button type="submit" class="lower-btn col-md-3 mr-md-3 btn btn-success">CREATE EVENT</button>
              <a href="{{ route('posts.index') }}" class="btn btn-primary col-md-3">戻る</a>
            </div>
            </form>
        </div>
    </div>
 </div>

@endsection
