@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row log-reg-form">
        <div class="col-md-6 p-0">
            <div class="card log-reg-card">
                <div class="card-header log-reg-card-header">{{ __('Login') }}</div>

                <div class="card-body log-reg-card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-0">
                                <button type="submit" class="btn btn-primary btn-block col-lg-2">
                                    {{ __('Login') }}
                                </button>
                        </div>

                        @if (Route::has('password.request'))
                        <small class="btn btn-link float-right pb-0" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                        </small>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
