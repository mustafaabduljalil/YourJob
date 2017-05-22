@extends('layouts.app')

@section('title')
  {{$company->name}}
@endsection

@section('content')


	<div class="container">
				<div class="row">


          <div class="col-md-12 div-img">
          
            <div class="col-md-3 profile-img">
            @if($company->logo=="")
<!--                 <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=150&r=pg&d=mm" alt="profile_photo">
 -->             <img data-name="{{$company->name}}" class="profile"/> 

            @else
               <img src="{{Storage::disk('local')->url($company->logo)}}" alt="profile-image">           
            @endif 
            </div>
                       
            <div class="col-md-5 prap2">
              <h3>{{$name}}</h3>
              <h5 class="h5">{{$company->track}} {{trans('navbar.Company')}}</h5>
              @if(Auth::user()->type=="jobseeker")
                @if(count($flag)==0)
                <a href="/followCompany/{{$company->id}}/{{Auth::user()->seeker->id}}" class="btn btn-info btn-sm">Follow <i class="fa fa-bell-o" aria-hidden="true"></i>
</a>
                @else
                <a href="/deleteFollowing/{{$company->id}}/{{Auth::user()->seeker->id}}" class=" btn btn-info btn-sm">UnFollow <i class="fa fa-bell-o" aria-hidden="true"></i>
</a>
                @endif
                <a data-target="#msgModel" data-toggle="modal" type="button" class="btn btn-info btn-sm">Message <i class="fa fa-commenting-o" aria-hidden="true"></i></a>
                    

                    <!-- Message Modal -->
                      <div class="modal fade" id="msgModel" role="dialog">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">{{trans('navbar.Message to')}} {{$company->name}}</h4>
                            </div>
                            <form action="/send_msg_to_profile" method="get" class="form-group">

                              {{csrf_field()}}
                              <div class="modal-body">
                                  <input type="hidden" name="email" value="{{$company->email}}" >
                                  <textarea name="msg" class="form-control" placeholder="Typr your message" rows="5" cols="40"></textarea>
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-danger btn-sm" value="{{trans('navbar.Send')}}">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
              @endif
            </div>  
      
          </div>
	       <div class="col-md-6 col-md-offset-3">  
              <div>              
                 <ul class="list-group">
                   <li class="list-group-item"><i class="fa fa-phone" aria-hidden="true"></i><b> {{trans('navbar.Contact Informations')}} </b> </li>
                   <li>{{trans('navbar.Country')}}: {{$company->country}}</li> 
                   <li>{{trans('navbar.City')}}: {{$company->city}}</li>
                   <li>{{trans('navbar.City')}}:{{$company->phone}}</li>
                   <li>{{trans('navbar.E-Mail Address')}}:{{$company->email}}</li>
                   <li>{{trans('navbar.Offical Website')}}: <a href="{{$company->website}}" target="_blank">{{$company->name}}</a></li>
                 </ul>
              </div>

 
        </div>

           </div><!-- class row-->
      </div><!-- container-fluid -->  

@endsection


@section('scroll')
        
        <div id="btn-top">
            <i class="fa fa-hand-o-up" aria-hidden="true"></i>
        </div>

@endsection