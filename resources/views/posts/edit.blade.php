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

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype='multipart/form-data'>
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

              <div class="form-group">
                <label for="exampleFormControlFile1">イメージ画像</label>
                <img src="{{ asset('storage/image/'.$post->gym_img) }}" alt="施設の画像" class="w-100 h-75">
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gym_img">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">タイトル</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name='title' value='{{ $post->title }}'>
              </div>

              <div class="form-group">
                <label for="comment">イベントの趣旨:</label>
                <textarea class="form-control" rows="3" id="about_group" name="about_group">{{ $post->about_group }}</textarea>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">施設名</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="gym_id">
                      <option selected="">選択する</option>
                      <option value="1">豊島区池袋スポーツジム</option>
                      <option value="1">豊島区池袋スポーツジム2</option>
                      <option value="1">豊島区池袋スポーツジム3</option>
                  </select>
              </div>

              <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-sm-12">開始日時</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                            <label for="datetimepicker1" class="pt-2 pr-2">日付:</label>
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker"/>
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
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                            <label for="datetimepicker2" class="pt-2 pr-2">時間:</label>
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
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
                <input type="text" class="form-control" id="exampleInputEmail1"  name='fee' value=''>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">募集人数</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="number_limit">
                      <option value="0" selected="">指定無し</option>
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
                      <option value="0" selected="">限定無し</option>
                      <option value="1">男性のみ</option>
                      <option value="2">女性のみ</option>
                  </select>
              </div>

              <input type="hidden" name="user_id" value="{{ Auth::id() }}">

              <button type="submit" class="btn btn-primary">更新</button>
            </form>
        </div>
    </div>
 </div>

@endsection
