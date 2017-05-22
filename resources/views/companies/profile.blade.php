@extends('layouts.app')

@section('title')
  {{Auth::user()->name}}
@endsection

@section('content')


  <div class="container">
        <div class="row">


        @if(count($company)==0)
            <h2 class="text-center">{{trans('messages.Complete Information')}}</h2>
        @else    
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
              <h3>{{Auth::user()->name}}</h3>
              <h5 class="h5">{{$company->field}} {{trans('navbar.Company')}}</h5>
              </div>  
      
          </div>


              <div class=" col-md-4">          
                  <ul class="list-group">
                      <li class="list-group-item side-update"> <i class="fa fa-user" aria-hidden="true"></i>  <a href="/updateComProfile">{{trans('navbar.Update Profile')}}</a></li>        
                      <li class="list-group-item side-update"> <i class="fa fa-handshake-o" aria-hidden="true"></i>  <a href="/createJob">{{trans('navbar.Add Job')}}</a></li>      
                      <li class="list-group-item side-update"> <i class="fa fa-book" aria-hidden="true"></i>  <a href="/addCourse">{{trans('navbar.Add Course')}}</a></li> 
                      <li class="list-group-item side-update"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <a href="/myJobs">{{trans('navbar.Our Jobs')}}</a></li>  
                      <li class="list-group-item side-update"> <i class="fa fa-book" aria-hidden="true"></i><a href="/ourCourses">{{trans('navbar.Our Courses')}}</a></li> 
                      <li class="list-group-item side-update"><i class="fa fa-file-image-o" aria-hidden="true"></i><a data-toggle="modal" data-target="#logoModel">{{trans('navbar.Profile Image')}}</a></li> 
                      <li class="list-group-item side-update"> <i class="fa fa-lock" aria-hidden="true"></i> <a data-toggle="modal" data-target="#passModel">{{trans('navbar.Change Password')}}</a></li>

                  </ul>
              </div> 

           <div class="col-md-6">  
                <div>  
                 <ul class="list-group">
              
                   <li class="list-group-item"><i class="fa fa-phone" aria-hidden="true"></i><b> {{trans('navbar.Contact Informations')}} </b> </li>
                   <li>{{trans('navbar.Country')}}: {{$company->country}}</li> 
                   <li>{{trans('navbar.City')}}: {{$company->city}}</li>
                   <li>{{trans('navbar.City')}}:{{$company->phone}}</li>
                   <li>{{trans('navbar.E-Mail Address')}}:{{$company->email}}</li>
                   <li>{{trans('navbar.Offical Website')}}: <a href="{{$company->website}}" target="_blank">{{Auth::user()->name}}</a></li>
                 </ul>
                </div>

   
          </div>

             </div><!-- class row -->
        </div><!-- container-fluid -->  



             <!-- Modal -->
                    <div class="modal fade" id="passModel" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{trans('navbar.New Password')}}</h4>
                          </div>
                          <form action="/changeComPass" method="post">

                            {{csrf_field()}}
                            <div class="modal-body">
                                <label>{{trans('navbar.New Password')}}</label>
                                <input type="password" name="newPassword" placeholder="{{trans('navbar.New Password')}}" class="form-control">
                                <label>{{trans('navbar.Confirm Password')}}</label>
                                <input type="password" name="confPassword" placeholder="{{trans('navbar.Confirm Password')}}" class="form-control">

                            </div>
                            <div class="modal-footer">
                              <input type="submit" class="btn btn-danger btn-sm" value="Save">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>



                      <!-- Modal -->
                    <div class="modal fade" id="logoModel" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{trans('navbar.Profile Image')}}</h4>
                          </div>
                          <form action="/editLogo" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <div class="modal-body">
                                <input type="file" name="newLogo">
                            </div>
                            <div class="modal-footer">
                              <input type="submit" class="btn btn-danger btn-sm" value="{{trans('navbar.Save')}}">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>                  

                @endif       
@endsection


@section('scroll')
        
        <div id="btn-top">
            <i class="fa fa-hand-o-up" aria-hidden="true"></i>
        </div>

@endsection