@extends('layouts.app')

@section('title')
 Courses
@endsection

@section('content')


  <div class="container">
   <div class="row">
    <h2 class="text-center courses">{{trans('navbar.Companies')}}</h2>
    <hr>
    <div class="col-md-6 col-md-offset-3 Company">

      @if(count($companies)==0)
        <h3 class="text-center">{{trans('messages.Not Company')}}</h3>
      @else

      @if(count($companies)>0)
          
          @foreach($companies as $company)
            <div class="course">
              <hr>
              <ul>
                <li><a href="/getCompany/{{$company->email}}">{{$company->name}}</a></li>
              </ul>
            </div>
          @endforeach
      @endif

      @endif
      
    </div>


  </div>

@endsection