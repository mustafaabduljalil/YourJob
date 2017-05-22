@extends('layouts.app')

@section('title')
	{{trans('navbar.Jobs')}}
@endsection


@section('content')

	<h2 class="text-center jobs">{{trans('messages.available jobs')}}</h2>
	<div class="container Job">
	 <div class="row">

	 	<div class="col-md-6 col-md-offset-3" class="text-center">
	 		<hr>
	 		@if(count($jobs)==0)
					<h3 class="text-center">{{trans('messages.Not available jobs')}}</h3>
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
							
							@if(Auth::user()->type=="jobseeker")
								<a class="btn btn-info btn-sm" href="/applyJob/{{$job->id}}">{{trans('navbar.Apply')}}</a>
							@endif
						</div>
					@endforeach
			@endif

	 	</div>
	 
	 </div>
	</div>
                

@endsection