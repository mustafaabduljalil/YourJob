@extends('layouts.app')

@section('title')
 {{trans('navbar.Our Courses')}}
@endsection

@section('content')

	<h2 class="text-center courses">{{trans('navbar.Our Courses')}}</h2>
	<div class="container Course">
	 <div class="row">

	 	<div class="col-md-6 col-md-offset-3">

			@if(count($courses)==0)
				<hr>
				<h3 class="text-center">{{trans('messages.Not available courses')}}</h3>
				<small> <a href="/addCourse">{{trans('messages.Click Add')}}</a></small>
			@else	
				@foreach($courses as $course)
					<div class="course">

						<ul>
						@if(Auth::user()->type=="company")
							<a href="/updateCourse/{{$course->id}}" data-toggle="tooltip" title="Edit" data-placement="bottom" style="float: right;"><i class="fa fa-pencil"></i></a>
							<a href="/deleteCourse/{{$course->id}}" data-toggle="tooltip" title="Delete" data-placement="bottom" style="float: right;"><i class="fa fa-close" ></i></a>

						@endif
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
				@endforeach
			@endif
		</div>
 
	</div>
   </div>

@endsection