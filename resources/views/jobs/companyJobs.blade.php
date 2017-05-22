@extends('layouts.app')

@section('title')
{{trans('navbar.Our Jobs')}}
@endsection


@section('content')

	<h2 class="text-center jobs">{{trans('navbar.Jobs')}}</h2>
	<div class="container Job">
	 <div class="row">

	 	<div class="col-md-6 col-md-offset-3">
	 		<hr>
	 		@if(count($jobs)==0)
					<h2>{{trans('messages.available jobs')}}</h2><small><a href="/createJob"> {{trans('messages.Click upload jobs')}}</a></small>
			@else		
				@foreach($jobs as $job)
					<div class="job">
						@if(Auth::user()->type=="company")
							<a href="/updateJob/{{$job->id}}" data-toggle="tooltip" title="Edit" data-placement="bottom" style="float: right;"><i class="fa fa-pencil"></i></a>
							<a href="/deleteJob/{{$job->id}}" data-toggle="tooltip" title="Delete" data-placement="bottom" style="float: right;"><i class="fa fa-close" ></i></a>

						@endif
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
							<li>{{trans('navbar.E-Mail Address')}}: {{$job->company->email}}</li>
						</ul>
						
					</div>
				@endforeach
			@endif

	 	</div>
	 
	 </div>
	</div>

@endsection