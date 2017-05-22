@extends('layouts.app')

@section('title')

{{trans('messages.Update Information')}}
@endsection


@section('content')
	
     <div class="container">                          
       <div class="row"> 
          <h2 class="text-center">{{trans('messages.Update Information')}}</h2>
          <div class="col-md-8" >     
              <form action="/saveComUpdate" method="get" enctype="multipart/form-data">
                  {{csrf_field()}}


                  <div class="col-md-6">
                   <label for="name">{{trans('navbar.Name')}} </label>
                   <input type="text" id="name" name="newname" placeholder="{{trans('navbar.Name')}}..">
                
                  </div>

                  <div class="col-md-6">
                   <label for="address">{{trans('navbar.Address')}} </label>
                   <input type="text" id="address" name="newaddress"  placeholder=" {{trans('navbar.Address')}}..">
                
                  </div>
               
                  <div class="col-md-6">
                   <label for="city">{{trans('navbar.City')}}</label>
                   <input type="text" id="city" name="newcity" placeholder="{{trans('navbar.City')}}..">                 
                  </div>

                 <div class="col-md-6">
                   <label for="Country">{{trans('navbar.Country')}}</label>
                   <input type="text" id="country" name="newcountry" placeholder="{{trans('navbar.Country')}}..">                
                 </div>

                 <div class="col-md-6">
                   <label for="phone">{{trans('navbar.Phone')}}</label>
                   <input type="text" id="phone" name="newphone" placeholder="{{trans('navbar.Phone')}}..">
                </div>
                  
                 <div class="col-md-6"> 
                   <label for="website">{{trans('navbar.Offical Website')}}</label>
                   <input type="text" id="website" name="newwebsite" placeholder="{{trans('navbar.Offical Website')}}..">
                 </div>
                  
                 <div class="col-md-6">
                   <label for="track">{{trans('navbar.Track')}}</label>
                   <input type="text" id="track" name="newtrack" placeholder="{{trans('navbar.Track')}}..">
                </div>
                  
                <input type="submit" id="button" value="{{trans('navbar.Save')}}">

                 </form>
             </div>
             <div class="col-md-4 wrapper">
              <div class="banner">
                <img src="images/ads.png" class="img-responsive">
              </div>
            </div>
        </div>
      </div>  
@endsection