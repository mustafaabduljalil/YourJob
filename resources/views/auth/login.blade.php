@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <h1 class="text-center">{{trans('messages.Make Future')}}</h1>

                </div>
            </div>    
        </div>        
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{trans('navbar.login')}}</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">{{trans('navbar.E-Mail Address')}}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
<!-- 
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif -->
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">{{trans('navbar.Password')}}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>
<!-- 
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{trans('navbar.Remember Me')}}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4 check-remember">
                                        <button type="submit" class="btn btn-primary">
                                            {{trans('navbar.Login')}}
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{trans('navbar.Forget')}}
                                        </a>
                                    </div>
                                </div>
                            </form>
                                <div class="social-wrap c" id="social-wrap">
                                    <button class="facebook"><a href="auth/facebook">Sign in Facebook</a></button>
                                    <button class="twitter"><a href="auth/twitter">Sign in Twitter</a></button>
                                    <button class="googleplus"><a href="auth/google">Sign in Google</a></button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
