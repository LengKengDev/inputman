@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">
                    <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
                    <div class="btn-wrapper text-center">
                        <img src="/images/brand/blue.png" width="200px">
                        @if ($errors->has('email') || $errors->has('password'))
                            <br>
                            <br>
                            <div class="alert alert-warning alert-dismissible"
                                 role="alert">
                                <button type="button" class="close"
                                        data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong><i class="fa fa-fw fa-exclamation-triangle"></i></strong> Invalid email or password.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group mb3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </div>

                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">
                                <span class="text-muted">Remember me</span>
                            </label>
                        </div>

                        <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">
                                    {{ __('Login') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    @if (Route::has('password.request'))
                        <a class="text-light" href="{{ route('password.request') }}">
                            <small>{{ __('Forgot Your Password?') }}</small>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
