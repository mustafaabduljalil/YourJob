@extends('layouts.app')

@section('title')
{{trans('navbar.Companies')}}
@endsection

@section('content')


	<div class="container">
	 <div class="row">

	 	<div class="col-md-6 col-md-offset-3 Company">

			@if(count($companies)>0)
					<h2 class="text-center courses">{{trans('navbar.Companies')}}
</h2>
					<hr>					
					@foreach($companies as $company)
						<div class="course">

							<ul style="list-style-type: none">
								<li>

									<a href="/getCompany/{{$company->email}}">

										@if($company->logo=="")
							<!--                 <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=150&r=pg&d=mm" alt="profile_photo" class="search-img">
							 -->          <img data-name="{{$company->name}}" class="profile_search"/> 



							              @else
							                 <img src="{{Storage::disk('local')->url($company->logo)}}" class="search-img" alt="profile-image">          
							              @endif
										{{$company->name}}
									</a>
								</li>
							</ul>
						</div>
					@endforeach
			@else
				<h3 class="text-center">{{trans('messages.Not Company')}}</h3>		
			@endif
			
		</div>

	</div>

@endsection