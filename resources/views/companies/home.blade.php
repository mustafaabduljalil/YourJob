@extends('layouts.app')

@section('title')
{{trans('navbar.Home')}}
@endsection

@section('content')

	<div class="container Job">
	 <div class="row">

	 	<div class="col-md-6">
	 		<h2 class="text-center">{{trans('navbar.Jobs')}}</h2>

	 		<hr>
	 		@if(count($jobs)==0)
					<h2>{{trans('messages.Not available jobs')}}</h2>
			@else		
					@foreach($jobs as $job)
						<div class="job">
							<h3>{{$job->title}}</h3>
							<p>{{$job->brief}}</p>
							<ul>
								<li>{{trans('navbar.Track')}}: {{$job->track}}</li>
								<li>{{trans('navbar.Gender')}}: {{$job->gender}}</li>
								<li>{{trans('navbar.Experience')}}: {{$job->experience}}</li>
								<li>{{trans('navbar.Required Education')}}: {{$job->education}}</li>
								<li>{{trans('navbar.Available position')}}: {{$job->position}}</li>
								<li>{{trans('navbar.Salary')}}: {{$job->salary}}</li>
								<li>{{trans('navbar.Address')}}: {{$job->company->address}}</li>
								<li>{{trans('navbar.City')}}: {{$job->company->city}}</li>
								<li>{{trans('navbar.Country')}}: {{$job->company->country}}</li>
								<li>{{trans('navbar.Company')}}: {{$job->company->name}}</li>
								<li>{{trans('navbar.E-Mail Address')}}: {{$job->company->email}}</li>
							</ul>
							
						</div>
					@endforeach
			@endif

		</div>

	 	<div class="col-md-6">
			<h2 class="text-center">{{trans('navbar.Courses')}}</h2>
			<hr>

			@if(count($courses)==0)
				<h3 class="text-center">{{trans('messages.Not available courses')}}</h3>

			@else	
				@foreach($courses as $course)
					<div class="course">
						<ul>
							<h3>{{$course->title}}</h3>
							<li>{{trans('navbar.Track')}}: {{$course->track}}</li>
							<li>{{trans('navbar.Brief')}}: {{$course->brief}}</li>
							<li>{{trans('navbar.Capacity')}}: {{$course->capacity}}</li>
							<li>{{trans('navbar.Company')}}: {{$course->company->name}}</li>
							<li>{{trans('navbar.E-Mail Address')}}: {{$course->company->email}}</li>
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
								<li>{{trans('navbar.Link')}}:<a href="{{$course->link}}" target="_blank"> {{(trans('navbar.Click here'))}}</a></li>
							@endif					

						</ul>
					</div>
				@endforeach
			@endif
		</div>

	 	</div>
	 
	 </div>

@endsection