@extends('layouts.app')

@section('title')
	{{trans('messages.jobs you have applied')}}
@endsection


@section('content')

	<h2 class="text-center jobs">{{trans('messages.jobs you have applied')}}</h2>
	<div class="container Job">
	 <div class="row">

	 	<div class="col-md-6 col-md-offset-3">
	 		<hr>
	 		@if(count($jobs)==0)
					<h2>{{trans('messages.Not available jobs')}}...</h2><span><a href="/getJobs"> {{trans('messages.Click here to apply jobs')}}</a></span>
			@else		
				@foreach($jobs as $job)
					<div class="job">
						@if(Auth::user()->type=="company")
							<a href="/updateJob/{{$job->id}}"><i class="fa fa-pencil"></i></a>
						@endif
						<h3>{{$job->title}}</h3>
						<p>{{$job->brief}}</p>
						<ul>
							<li>Track: {{$job->track}}</li>
							<li>Gender: {{$job->gender}}</li>
							<li>Experience: {{$job->experience}}</li>
							<li>Education: {{$job->education}}</li>
							<li>Availabe Position: {{$job->position}}</li>
							<li>Salary: {{$job->salary}}</li>
							<li>Address: {{$job->company->address}}</li>
							<li>City: {{$job->company->city}}</li>
							<li>Country: {{$job->company->country}}</li>
							<li>Email: {{$job->company->email}}</li>
						</ul>
						
					</div>
				@endforeach
			@endif

	 	</div>
	 
	 </div>
	</div>

                
@endsection