@extends('layouts.app')

@section('title')
 {{$course->title}}
@endsection

@section('content')

	<h2 class="text-center courses">{{$course->title}}</h2>
	<div class="container Course">
	 <div class="row">

	 	<div class="col-md-6 col-md-offset-3">
	
					<div class="course">
					<ul>

							<h3>{{$course->title}}</h3>
							<li>{{trans('navbar.Track')}}: {{$course->track}}</li>
							<li>{{trans('navbar.Brief')}}: {{$course->brief}}</li>
							<li>{{trans('navbar.Capacity')}}: {{$course->capacity}}</li>

							@if(is_null($course->price))
								<li>'Free'</li>
							@else
								<li>{{trans('navbar.Price')}}: {{$course->price}}</li>	
							@endif
							@if(! is_null($course->start_date))
								<li>{{trans('navbar.From')}}: {{$course->start_date}}</li>
								<li>{{trans('navbar.To')}}: {{$course->end_date}}</li>
							@endif
							@if(! is_null($course->address))
								<li>{{trans('navbar.Address')}}: {{$course->address}}</li>
							@endif							
							@if(! is_null($course->phone))
								<li>{{trans('navbar.Phone')}}: {{$course->phone}}</li>
							@endif	
							@if(! is_null($course->link))
								<li><a href="{{$course->link}}" target="_blank">{{trans('navbar.Link')}}</a></li>
							@endif					


						</ul>
					</div>
		</div>

	  </div>
	</div>

@endsection