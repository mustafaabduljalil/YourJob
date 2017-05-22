@extends('layouts.app')

@section('title')
	{{trans('navbar.Home')}}
@endsection


@section('content')
    <div class="container seekerHome">
     <div class="row">
        <div class="col-md-8 text-center" >
            @if(count($jobs)==0)
                    <h4 class="text-center">{{trans('messages.Not available jobs')}}...</h4><span class="text-center"><small><a href="/getJobs" > {{trans('messages.Click here to apply jobs')}}</a></small></span>
            @else       
                    @foreach($jobs as $job)
                        <div class="job">
                            <h3>{{$job->title}}</h3>
                            <p>{{$job->brief}}</p>
                            <ul>
                                <li>Field: {{$job->field}}</li>
                                <li>Gender: {{$job->gender}}</li>
                                <li>Experience: {{$job->experience}}</li>
                                <li>Education: {{$job->education}}</li>
                                <li>Salary: {{$job->salary}}</li>
                                <li>Address: {{$job->company->address}}</li>
                                <li>City: {{$job->company->city}}</li>
                                <li>Country: {{$job->company->country}}</li>
                                <li>Email: {{$job->company->email}}</li>
                            </ul>
                            @if(Auth::user()->type=="jobseeker")
                                <a class="btn btn-info btn-sm" href="/applyJob/{{$job->id}}">{{trans('navbar.Apply')}}</a>
                            @endif
                        </div>
                    @endforeach
            @endif

        </div>

        <div class="col-md-4 recommended">
            <h4 class="text-center">{{trans('messages.Recommended For You')}}</h4>
            <hr>

                    @if(count($interestingCompany)>0)
                            @foreach($interestingCompany as $interCompany)
                                    <ul style="list-style-type: none">
                                        <li>

                                        <a href="/getCompany/{{$interCompany->email}}">
                                              @if($interCompany->logo=="")
                                <!--                 <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=150&r=pg&d=mm" alt="profile_photo" class="search-img">
                                 -->            <img data-name="{{$interCompany->name}}" class="profile_nav"/>


                                              @else
                                                 <img src="{{Storage::disk('local')->url($interCompany->logo)}}" class="recommended-img" alt="profile-image">          
                                              @endif
                                            {{$interCompany->name}}

                                        </a>
                                        <h6>{{trans('navbar.Company')}}</h6>
                                        </li>
                                    </ul>
                            @endforeach
                    @endif        

                    @if(count($interestingCourse)>0)
                        @foreach($interestingCourse as $interCourse)
                                <ul style="list-style-type: none">
                                    <li>
                                    <img data-name="{{$interCourse->title}}" class="profile_nav"/>
                                        <a href="/getCourse/{{$interCourse->id}}">
                                <!--                 <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=150&r=pg&d=mm" alt="profile_photo" class="search-img">
                                 --> 
               
                                            {{$interCourse->title}}

                                        </a>
                                        <h6>{{trans('navbar.Courses')}}</h6>
                                    </li>
                                </ul>
                        @endforeach
                    @endif




                    @if(count($interestingJobs) > 0)
                        @foreach($interestingJobs as $interestingJob)
                                <ul style="list-style-type: none">
                                    <li>
                                        <a href="/recommendedJob/{{$interestingJob->id}}">
                                            <img data-name="{{$interestingJob->title}}" class="profile_nav"/>
                                            {{$interestingJob->title}}

                                        </a>
                                        <h6>{{trans('navbar.Jobs')}}</h6>
                                    </li>
                                </ul>
                        @endforeach
                    @endif



        </div>

     
     </div>
    </div>
                
@endsection