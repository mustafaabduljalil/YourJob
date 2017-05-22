@extends('layouts.app')

@section('title')
  {{trans('messages.Update Course')}}
@endsection


@section('content')


  <div class="container" companyprofile>
    <div class="row">
           
            <h1 class="text-center">{{trans('messages.Update Course')}}</h1>
               
            <div class="col-md-8">     

              <form action="/saveUpdateCourse/{{$courseId}}" method="get">

                 <div class="col-md-12">
                   <label for="coursetitle">{{trans('navbar.Title')}}</label>
                   <input type="text" id="coursetitle" name="title" placeholder="{{trans('navbar.Title')}}..">
                 </div>

                <div class="col-md-6"> 
                 <label for="track">{{trans('navbar.Track')}}</label>
                 <input type="text" id="track" name="track" placeholder="{{trans('navbar.Track')}}..">
                </div>                 
                
                <div class="col-md-6"> 
                 <label for="Capacity">{{trans('navbar.Capacity')}}</label>
                 <input type="number" id="capacity" name="capacity">
                </div>

                <div class="col-md-6"> 
                 <label for="startdate">{{trans('navbar.Start Date')}}</label>
                 <input type="date" id="startdate" name="startdate" placeholder="{{trans('navbar.Start Date')}}">
                </div>
   
           
                 <div class="col-md-6">  
                   <label for="enddate">{{trans('navbar.End Date')}}</label>
                   <input type="date" id="enddate" name="enddate" placeholder="{{trans('navbar.End Date')}}">
                 </div>

              
                 <div class="col-md-6"> 
                   <label for="price">{{trans('navbar.Price')}}</label>
                   <input type="text" id="price" name="price" placeholder="{{trans('navbar.Price')}}">
                 </div>


                 <div class="col-md-6">
                   <label for="link">{{trans('navbar.Link')}}</label>
                   <input type="text" id="courselink" name="link" placeholder="{{trans('navbar.Link')}}">
                 </div>

                 <div class="col-md-6">
                   <label for="address">{{trans('navbar.Address')}}</label>
                   <input type="text" id="address" name="address" placeholder="{{trans('navbar.Address')}}">
                 </div>


                 <div class="col-md-6">
                   <label for="address">{{trans('navbar.Phone')}}</label>
                   <input type="text" id="phone" name="phone" placeholder="{{trans('navbar.Phone')}}">
                 </div>

                 <div class="col-md-12">
                    <label for="brief">{{trans('navbar.Brief')}}:</label>
                    <textarea name="brief" rows="5" id="brief" placeholder="{{trans('navbar.Brief')}}"></textarea>
                 </div>

                 
                 <input type="submit" id="button" value="{{trans('navbar.Save')}}">
  
               
              </form>
          <!--Ads Div-->
            </div> 
            
            <div class="col-md-4 wrapper">
              <div class="banner">
                <img src="../images/ads.png" class="img-responsive">
              </div>
            </div>

           </div> <!-- class row -->
        </div> <!-- container -->

@endsection