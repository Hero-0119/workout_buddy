@extends('layouts.app')

@section('content')
<div class="card-header bg-dark text-white-50 event-header">{{ $host->name }}'s Page</div>
<div class="card-body row p-0 mx-0">
  @if (session('status'))
    <div class="alert alert-success col-12" role="alert">
        {{ session('status') }}
    </div>
  @endif

    <div class="card-body text-center user-form user-bg">

        <img src="{{ asset('storage/image/'.$host->user_img) }}" class="img-thumbnail rounded-circle mb-2" width="200px" height="200px">

        <div class="form-group row">
            <label for="name" class="col-md-6 text-md-right">
                <i class="fas fa-edit"></i>
            </label>
            <lavel class="col-md-6 text-md-left">
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
                まだ評価はありません。
            @endif
            </lavel>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-6 text-md-right">
                <i class="fas fa-user-alt"></i>
            </label>
            <lavel class="col-md-6 text-md-left">
                {{ $host->name }}
            </lavel>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-6 text-md-right">
                <i class="fas fa-id-badge"></i>
            </label>
            <lavel class="col-md-6 text-md-left">
                {{ $host->introduction }}
            </lavel>
        </div>

    @if($host->sex == 1)
        <div class="form-group row">
            <label for="name" class="col-md-6 text-md-right">
                <i class="fas fa-male"></i>
            </label>
            <lavel class="col-md-6 text-md-left">
                Male
            </lavel>
        </div>
    @else
        <div class="form-group row">
            <label for="name" class="col-md-6 text-md-right">
               <i class="fas fa-female"></i>
            </label>
            <lavel class="col-md-6 text-md-left">
                Female
            </lavel>
        </div>
    @endif

        <div class="form-group row mb-0">
            <label for="name" class="col-md-6 text-md-right">
                <i class="fas fa-dumbbell"></i>
            </label>
            <lavel class="col-md-6 text-md-left">
                {{ $host->gym }}
            </lavel>
        </div>
    </div>
 </div>
<div class="row justify-content-center">
    <input type="button" onclick="history.back()" value="戻る" class="btn btn-primary col-md-3">
</div>

@endsection
