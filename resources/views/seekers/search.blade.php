@extends('layouts.app')

@section('title')
 Job Seekers
@endsection

@section('content')


	<div class="container">
	 <div class="row">

	 	<div class="col-md-6 col-md-offset-3 seekerHome">
		<h2 class="text-center courses">{{trans('messages.available jobseekers')}}</h2>
		<hr>
			@if(count($seekers)>0)
					@foreach($seekers as $seeker)
						<div class="course">

							<ul style="list-style-type: none">
								<li>

								<a href="/getSeeker/{{$seeker->email}}">
						              @if($seeker->image=="")
						<!--                 <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=150&r=pg&d=mm" alt="profile_photo" class="search-img">
						 -->            <img data-name="{{$seeker->name}}" class="profile_search"/> 



						              @else
						                 <img src="{{Storage::disk('local')->url($seeker->image)}}" class="search-img" alt="profile-image">          
						              @endif
									{{$seeker->name}}
								</a>
								</li>
							</ul>
						</div>
					@endforeach

				@else
					<h3 class="text-center">{{trans('messages.Not available jobseekers')}}</h3>

			@endif
			
		</div>


	</div>

@endsection