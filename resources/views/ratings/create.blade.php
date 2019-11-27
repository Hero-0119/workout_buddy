@extends('layouts.app')

@section('content')
<div class="card-header  bg-dark text-white-50 event-header">REVIEW</div>

<div class="card-body px-0">
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
            <form action="{{ route('ratings.store') }}" method="POST">
            {{ csrf_field() }}
              <div class="form-group row">
                  <label for="user_evaluation" class="col-md-4 text-md-right">評価:</label>
                  <div class="col-md-6 text-center ml-2">
                    @for ($i=1; $i<=5; $i++)
                      <div class="form-check form-check-inline col-md-2 align-middle">
                          <input class="form-check-input" type="radio" value="{{$i}}" name="user_evaluation">
                          <label class="form-check-label">☆{{$i}}</label>
                      </div>
                    @endfor
                  </div>
              </div>

              <div class="form-group row">
                <label class="col-md-4 text-md-right" for="feedback_comment">コメント:</label>
                <textarea class="form-control col-md-5 ml-4" rows="3" name="feedback_comment"></textarea>
              </div>

              <input type="hidden" name="post_id" value="{{ $mypost->post_id }}">
              <input type="hidden" name="host_id" value="{{ $mypost->host_id }}">
              <input type="hidden" name="user_id" value="{{ $mypost->user_id }}">

            <div class="row justify-content-center">
              <button type="submit" class="lower-btn col-md-3 mr-md-3 btn btn-success">SEND</button>
              <input type="button" onclick="history.back()" value="戻る" class="col-md-3 btn btn-primary">
            </div>
            </form>
        </div>
    </div>
 </div>

@endsection
