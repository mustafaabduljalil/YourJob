@extends('layouts.app')
@section('title')
    {{trans('navbar.register')}}
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
                            <div class="panel-heading reg">{{trans('navbar.register')}}</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{route('register')}}">
                                    {{ csrf_field() }}


                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">{{trans('navbar.Name')}}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{trans('navbar.Name')}}" required>

                                     <!--        @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif -->
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">{{trans('navbar.E-Mail Address')}}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{trans('navbar.E-Mail Address')}}" required style="color: #000">
<!-- 
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif -->
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                        <label for="type" class="col-md-4 control-label">{{trans('navbar.Type')}}</label>
                                        
                                        <div class="col-md-6">
                                            <select name="type" id="type">
                                                <option value="jobseeker">{{trans('navbar.Job Seeker')}}</option>
                                                <option value="company">{{trans('navbar.Company')}}</option>
                                            </select>

                                      <!--       @if ($errors->has('type'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                </span>
                                            @endif -->

                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">{{trans('navbar.Password')}}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="{{trans('navbar.Password')}}" required>

                                    <!--         @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-4 control-label">{{trans('navbar.Confirm Password')}}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{trans('navbar.Confirm Password')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{trans('navbar.register')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
