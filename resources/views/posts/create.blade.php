@extends('layouts.app')

@section('content')
<div class="card-header">イベントという何かの概要</div>

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
                <label for="exampleFormControlFile1">イメージ画像</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gym_img">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">タイトル</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name='title'>
              </div>

              <div class="form-group">
                <label for="comment">イベントの趣旨:</label>
                <textarea class="form-control" rows="3" id="about_group" name="about_group"></textarea>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">施設名</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="gym_id">
                      <option value="">選択する</option>
                      @foreach($gyms as $gym)
                      <option value="{{ $gym->id }}">{{ $gym->gym_name }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-sm-12">イベント開催日時</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                            <label for="datetimepicker1" class="pt-2 pr-2">日付:</label>
                            <input type="date" class="form-control datetimepicker-input" data-target="#datetimepicker" name="event_date">
                            <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker1').datetimepicker({
                            format: 'LT'
                        });
                    });
                </script>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                            <label for="datetimepicker2" class="pt-2 pr-2">開始時間:</label>
                            <input type="time" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="start_time">
                            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker2').datetimepicker({
                            format: 'LT'
                        });
                    });
                </script>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                            <label for="datetimepicker2" class="pt-2 pr-2">終了時間:</label>
                            <input type="time" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="end_time">
                            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker2').datetimepicker({
                            format: 'LT'
                        });
                    });
                </script>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">料金設定</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="￥0" name='fee'>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">募集人数</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="number_limit">
                      <option value="指定無し" selected="">指定無し</option>
                      <option value="1名">1名</option>
                      <option value="2名">2名</option>
                      <option value="3名">3名</option>
                      <option value="4名">4名</option>
                      <option value="5名">5名</option>
                      <option value="6名">6名</option>
                  </select>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">性別の限定</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="sex_limit">
                      <option value="限定無し" selected="">限定無し</option>
                      <option value="男性のみ">男性のみ</option>
                      <option value="女性のみ">女性のみ</option>
                  </select>
              </div>

              <input type="hidden" name="user_id" value="{{ Auth::id() }}">

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
 </div>

@endsection
