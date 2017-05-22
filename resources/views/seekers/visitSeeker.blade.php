@extends('layouts.app')

@section('title')
  {{$seeker->name}}
@endsection

@section('content')


  <div class="container seekerHome">
        <div class="row"> 

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
                <h3>{{$seeker->name}}</h3>
                <h5 class="h5">{{$seeker->job_title}}</h5>
                <a data-target="#msgModel" data-toggle="modal" type="button" class="btn btn-info btn-sm">Message <i class="fa fa-commenting-o" aria-hidden="true"></i></a>
                    

                    <!-- Message Modal -->
                      <div class="modal fade" id="msgModel" role="dialog">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">{{trans('navbar.Message to')}} {{$seeker->name}}</h4>
                            </div>
                            <form action="/send_msg_to_seeker" method="get" class="form-group">

                              {{csrf_field()}}
                              <div class="modal-body">
                                  <input type="hidden" name="email" value="{{$seeker->email}}" >
                                  <textarea name="msg" class="form-control" placeholder="Typr your message" rows="5" cols="40"></textarea>
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-danger btn-sm" value="{{trans('navbar.Send')}}">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>



                </div>  
        
            </div>

             <div class="col-md-6 col-md-offset-3">  
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
                    <li class="list-group-item"><i class="fa fa-language" aria-hidden="true"></i><b> {{trans('navbar.Languages')}}</b></li>
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
                  <li class="list-group-item"><i class="fa fa-star" aria-hidden="true"></i><b> {{trans('navbar.Skills')}}</b></li>
                  @forelse($skills as $skill)
                          <li>
                            {{$skill->skill}}
                          </li>
                      @empty
                           <li>{{trans('messages.Msg Skills')}}</li>                   
                  @endforelse
      
                 </ul>

              </div>


            <div>
                 <ul class="list-group">
                 <li class="list-group-item"><i class="fa fa-flask" aria-hidden="true"></i><b> {{trans('navbar.Experience')}}</b></li>
                  @forelse($experience as $experience)
                      <li>
                        {{$experience->company_name}}
                        <span>for {{$experience->years}}  year</span>
                      </li>
                  @empty
                       <li>{{trans('messages.Msg Experience')}}</li>                   
                  @endforelse
      
                 </ul>


            </div>

            <div>  
                <div class= "cv" >
                    
                       <ul class="list-group">
                         <li class="list-group-item"><i class="fa fa-book" aria-hidden="true"></i><b> {{trans('navbar.C.V')}} </b> </li>
                         <li><a href="/downloadCV/{{$seeker->id}}">{{trans('navbar.Download')}}</a></li>  
                                                      
                       </ul>
                </div>
            </div>


            </div>




               </div><!-- class row -->
          </div><!-- container-fluid -->  





@endsection


