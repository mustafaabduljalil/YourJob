@extends('admin.master')

@section('title')
    Admin Panle
@endsection

@section('content')
        <div class="col-sm-12 col-md-12 well" id="content">
            <h1 class="text-center">Welcome {{Auth::user()->name}}</h1>
        </div>

@endsection