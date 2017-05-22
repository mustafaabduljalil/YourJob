@extends('layouts.app')

@section('title')
  {{Auth::user()->name}}
@endsection

@section('content')


  <div class="container">
        <div class="row">

        @if(count($seeker)==0)
            <h2 class="text-center">{{trans('messages.Complete Information')}}</h2>
        @else 

            <div class="col-md-12 div-img">
            
              <div class="col-md-3 profile-img">
              @if($seeker->image=="")
<!--                 <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=150&r=pg&d=mm" alt="profile_photo">
 -->             <img data-name="{{$seeker->name}}" class="profile"/> 


              @else
                 <img src="{{Storage::disk('local')->url($seeker->image)}}" alt="profile-image">          
              @endif
              </div>

                         
                <div class="col-md-5 prap2">
                <h3>{{Auth::user()->name}}</h3>
                <h5 class="h5">{{$seeker->job_title}}</h5>
                </div>  
        
            </div>


                <div class=" col-md-4">          
                    <ul class="list-group">
                        <li class="list-group-item side-update"> <i class="fa fa-user" aria-hidden="true"></i>  <a href="/updateProfile">{{trans('navbar.Update Profile')}}</a></li>
                        <li class="list-group-item side-update"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <a href="/myJobs">{{trans('navbar.My Jobs')}}</a></li>
                        <li class="list-group-item side-update"> <i class="fa fa-heart" aria-hidden="true"></i><a href="/followingCompanines">{{trans('navbar.Following Company')}}</a></li> 
                        <li class="list-group-item side-update"> <i class="fa fa-lock" aria-hidden="true"></i> <a data-toggle="modal" data-target="#passModel">{{trans('navbar.Change Password')}}</a></li> 

                        <li class="list-group-item side-update"><i class="fa fa-file-image-o" aria-hidden="true"></i><a data-toggle="modal" data-target="#imgModel">{{trans('navbar.Profile Image')}}</a></li> 

                        
                        

                    </ul>
                </div> 

             <div class="col-md-6">  
                  <div>  
                   <ul class="list-group">
                
                     <li class="list-group-item"><i class="fa fa-phone" aria-hidden="true"></i><b> {{trans('navbar.Contact Informations')}} </b> </li>
                     <li>{{trans('navbar.Phone')}}:{{$seeker->phone}}</li>
                     <li>{{trans('navbar.Email')}}:{{$seeker->email}}</li>
                   </ul>
                  </div>

     

                <div class= " informations" >
                    
                       <ul class="list-group">
                         <li class="list-group-item"><i class="fa fa-user" aria-hidden="true"></i><b> {{trans('navbar.Personal Informations')}}</b> </li>
                         <li>{{trans('navbar.Address')}}: {{$seeker->address}}</li>  
                         <li>{{trans('navbar.City')}}: {{$seeker->city}}</li>
                         <li>{{trans('navbar.Country')}}: {{$seeker->country}}</li>                                                      
                       </ul>

                </div>


            <div>
                 <ul class="list-group">
                   <li class="list-group-item"><i class="fa fa-language" aria-hidden="true"></i><b> {{trans('navbar.Languages')}}</b><a  data-toggle="modal" data-target="#langModel"><i class="fa fa-plus text-right" aria-hidden="true"></i></a></li>
                      <!-- Modal -->
                      <div class="modal fade" id="langModel" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">{{trans('navbar.Add Language')}}</h4>
                            </div>
                            <form action="/addLanguage" method="get">
                              {{csrf_field()}}
                              <div class="modal-body">
                                  <label>{{trans('navbar.Add Language')}}</label>
                                
                                  <select name="lang">
                                    @foreach($availablelangs as $availablelang)
                                    <option value="{{$availablelang->name}}">{{$availablelang->name}}</option>
                                    @endforeach
                                  </select>
                                
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-danger btn-sm" value="{{trans('navbar.Add')}}">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    
                      @forelse($langs as $lang)
                          <li>
                            {{$lang->name}}
                            <a href="/deleteLanguage/{{$lang->name}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                          </li>
                      @empty
                           <li>{{trans('messages.Msg Languages')}}</li>                   
                      @endforelse
      
                 </ul>

              </div>

            <div>
                 <ul class="list-group">
                   <li class="list-group-item"><i class="fa fa-star" aria-hidden="true"></i><b> {{trans('navbar.Skills')}}</b><a href="#" data-toggle="modal" data-target="#skillModel"><i class="fa fa-plus text-right" aria-hidden="true"></i></a></li>
                      <!-- Modal -->
                      <div class="modal fade" id="skillModel" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">{{trans('navbar.Add Skill')}}</h4>
                            </div>
                            <form action="/addSkill" method="get">
                              {{csrf_field()}}
                              <div class="modal-body">
                                  <label>{{trans('navbar.Skills')}}</label>
                                  <input type="text" name="skill" placeholder="Skill" class="form-control">
                                
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-danger btn-sm" value="{{trans('navbar.Add')}}">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    
                      @forelse($skills as $skill)
                          <li>
                            {{$skill->skill}}
                            <a href="/deleteSkill/{{$skill->skill}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                          </li>
                      @empty
                           <li>{{trans('messages.Msg Skills')}}</li>                   
                      @endforelse
      
                 </ul>

              </div>


            <div>
                 <ul class="list-group">
                   <li class="list-group-item"><i class="fa fa-flask" aria-hidden="true"></i><b> {{trans('navbar.Experience')}}</b><a href="#" data-toggle="modal" data-target="#experienceModel"><i class="fa fa-plus text-right" aria-hidden="true"></i></a></li>
                      <!-- Modal -->
                      <div class="modal fade" id="experienceModel" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">{{trans('navbar.Add Experience')}}</h4>
                            </div>
                            <form action="/addExps" method="get">
                              {{csrf_field()}}
                              <div class="modal-body">
                                  <label>{{trans('navbar.Company')}}</label>
                                  <input type="text" name="company_name" placeholder="Company Name" class="form-control">
                                  <label>{{trans('navbar.Duration')}}</label>
                                  <input type="text" name="years" placeholder="Duration in years" class="form-control">
                                
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-danger btn-sm" value="{{trans('navbar.Add')}}">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    
                      @forelse($experience as $experience)
                          <li>
                            {{$experience->company_name}}
                            <span>for {{$experience->years}}  year</span>
                            <a href="/deleteExps/{{$experience->company_name}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                          </li>
                      @empty
                           <li>{{trans('messages.Msg Experience')}}</li>                   
                      @endforelse
      
                 </ul>


              </div>
          @if($seeker->cv != Null)
            <div>  
                <div class= "cv" >
                       <ul class="list-group">
                         <li class="list-group-item"><i class="fa fa-book" aria-hidden="true"></i><b> {{trans('navbar.C.V')}} </b> </li>
                         <li><a href="downloadCV/{{$seeker->id}}">{{trans('navbar.Download')}}</a></li>  
                                                      
                       </ul>
                </div>
            </div>
          @endif

              <div>

                      <!-- Modal -->
                      <div class="modal fade" id="passModel" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">{{trans('navbar.New Password')}}</h4>
                            </div>
                            <form action="/changePass" method="post">

                              {{csrf_field()}}
                              <div class="modal-body">
                                  <label>{{trans('navbar.New Password')}}</label>
                                  <input type="password" name="newPassword" placeholder="{{trans('navbar.New Password')}}" class="form-control">
                                  <label>{{trans('navbar.Confirm Password')}}</label>
                                  <input type="password" name="confPassword" placeholder="{{trans('navbar.Confirm Password')}}" class="form-control">

                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-danger btn-sm" value="{{trans('navbar.Save')}}">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
      

                        <!-- Modal -->
                      <div class="modal fade" id="imgModel" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">{{trans('navbar.Profile Image')}}</h4>
                            </div>
                            <form action="/editImage" method="post" enctype="multipart/form-data">

                              {{csrf_field()}}
                              <div class="modal-body">
                                  <input type="file" name="newImage">
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-danger btn-sm" value="{{trans('navbar.Save')}}">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

            
            </div>

               </div><!-- class row -->
          </div><!-- container-fluid -->  
        @endif

@endsection


@section('scroll')
        
        <div id="btn-top">
            <i class="fa fa-hand-o-up" aria-hidden="true"></i>
        </div>

@endsection