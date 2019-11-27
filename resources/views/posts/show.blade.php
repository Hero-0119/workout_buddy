@extends('layouts.app')

@section('content')
<div class="card-header bg-dark text-white-50 event-header">DETAILS</div>
<div class="card-body row show-bg">
  @if (session('status'))
    <div class="alert alert-success col-12" role="alert">
        {{ session('status') }}
    </div>
  @endif

    <div class="card-body row user-show py-0">
        <div class="detail-left col-md-6">
            <img src="{{ asset('storage/image/'.$post->gym_img) }}" alt="施設の画像" class="event-show-img">
        </div>

        <div class="detail-right col-md-6  align-self-center">
            <div class="event-user-col row">
                <a href="{{ route('users.show', $post->host->id) }}" class="btn p-0 col-md-3 card-title">
                    <img src="{{ asset('storage/image/'.$post->host->user_img) }}" class="img-thumbnail rounded-circle" width="100px" height="100px" alt="主催者の画像">
                </a>
                <div class="col-md-6 align-self-center card-title p-0 px-3">
                    <span class="event-user-name">
                            <i class="fas fa-user-alt"></i>　{{ $post->host->name }}
                    </span>

                    <span class="event-user-name">
                        @if($totalization == 1)
                            ★☆☆☆☆  {{$totalization}}.0
                        @elseif($totalization == 2)
                            ★★☆☆☆  {{$totalization}}.0
                        @elseif($totalization == 3)
                            ★★★☆☆  {{$totalization}}.0
                        @elseif($totalization == 4)
                            ★★★★☆  {{$totalization}}.0
                        @elseif($totalization == 5)
                            ★★★★★  {{$totalization}}.0
                        @else
                            (まだ評価はありません。)
                        @endif
                    </span>
                </div>
            </div>

            <h5 class="show-card card-title row">
                <i class="card-i fas fa-dumbbell col-md-1"></i>
                <span class="card-span col-md-11">{{ $post->title }}</span>
            </h5>

            <h5 class="show-card card-title row">
                <i class="card-i fas fa-file-alt col-md-1"></i>
                <span class="card-span col-md-11">{{ $post->about_group }}</span>
            </h5>

            <h5 class="card-title">
                <i class="fas fa-map-marker-alt"></i>　{{ $post->gym->gym_name }}
            </h5>

            <h5 class="card-title">
                <i class="fas fa-calendar-alt"></i>　{{ $post->event_date }}
            </h5>

            <h5 class="card-title">
                <i class="fa fa-clock"></i>　{{ Carbon\Carbon::parse($post->start_time)->format('H:i') }}~{{ Carbon\Carbon::parse($post->end_time)->format('H:i') }}
            </h5>

    @if($post->fee == '')
            <h5 class="card-title">
                <i class="fas fa-coins"></i>　￥0
            </h5>
    @else
            <h5 class="card-title">
                <i class="fas fa-coins"></i>　￥{{ $post->fee }}
            </h5>
    @endif

    @if($post->number_limit != 100)
            <h5 class="card-title">
                <i class="fas fa-user-alt-slash"></i>　{{ $post->number_limit }}名
            </h5>
    @else
            <h5 class="card-title">
                <i class="fas fa-user-alt-slash"></i>　指定無し
            </h5>
    @endif

    @if($post->sex_limit == 0)
            <h5 class="card-title">
                <i class="fas fa-venus-mars"></i>　限定無し
            </h5>
    @elseif($post->sex_limit == 1)
            <h5 class="card-title">
                <i class="fas fa-male"></i>　男性限定
            </h5>
    @else
            <h5 class="card-title">
                <i class="fas fa-female"></i>　女性限定
            </h5>
    @endif

    @guest
    <a class="nav-link btn btn-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
    @endguest

    @auth

<div class="row lower-btn2">
    @if($post->event_date > $date)
    @if($post->number_limit == $count)
        <p>定員数に達しました。</p>
    @else
        <form action="{{ route('postuser.store', $post->id) }}" method="POST" class="col-12 px-0">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            @if(Auth::id() != $post->host_id)
                @isset($joinuser)
                <input type="hidden" value="参加する" name="join" class="btn btn-danger w-100">
                @else
                <input type="submit" value="参加する" name="join" class="btn btn-danger w-100">
                @endisset
            @endif
        </form>
    @endif
    @endif

    @isset($joinuser)
        @if($post->event_date < $date)
        <form action="{{ route('ratings.create') }}" method="POST" class="col-12 px-0">
            {{ csrf_field() }}
            {{ method_field('GET') }}
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="host_id" value="{{ $post->host->id }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="submit" value="評価する" name="join" class="btn btn-success w-100">
        </form>
        @else
        <a href="{{ route('posts.comments.index', $post->id) }}" class="btn btn-danger col-12"><i class="fas fa-comments"></i>チャット画面へ</a>
        @endif
     @endisset

    @if(Auth::id() == $post->host_id)
    <a href="{{ route('posts.comments.index', $post->id) }}" class="btn btn-danger col-12"><i class="fas fa-comments"></i>チャット画面へ</a>
</div>
<div class="row lower-btn2">
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success col-6">編集</a>

     <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="col-6 px-0">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="削除" name="delete" class="btn btn-secondary w-100">
    </form>
    @endif
    @endauth
</div>
<div class="row">
    <input type="button" onclick="history.back()" value="戻る" class="col-12 btn btn-primary px-0">
</div>
        </div>
    </div>
 </div>



@endsection
