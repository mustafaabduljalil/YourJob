@extends('layouts.app')

@section('title')
{{trans('messages.Add Job')}}
@endsection

@section('content')



          <div class="container" companyprofile>
          <div class="row">
    

           
          <div class="col-md-12 title ">
            <h1 class="text-center">{{trans('messages.Add Job')}}</h1>
          </div>
          
          <div class="col-md-8">     

            <form action="/uploadJob" method="get">
              {{csrf_field()}}
              <div class="col-md-6">
                <label for="jobtitle">{{trans('navbar.Title')}}</label>
                <input type="text" id="jobtitle" name="jobtitle" placeholder="{{trans('navbar.Title')}}..">
              </div>
               <div class="col-md-6">
                 <label for="jobtrack">{{trans('navbar.Track')}} </label>
                 <input type="text" id="jobtrack" name="jobtrack" placeholder="{{trans('navbar.Track')}}..">
               </div>

               <div class="col-md-6">
                 <label for="position">{{trans('navbar.Available position')}} </label>
                 <input type="number" id="position" name="position">
               </div>

               <div class="col-md-6">
                  <label for="gender">{{trans('navbar.Gender')}}</label>
                  <select name="gender" id="gender">
                      <option value="male">{{trans('navbar.male')}}</option>
                      <option value="female">{{trans('navbar.female')}}</option>
                  </select>

              </div>

               <div class="col-md-6">
                 <label for="reqedu">{{trans('navbar.Required Education')}}</label>
                 <input type="text" id="reqedu" name="reqeducation" placeholder="{{trans('navbar.Required Education')}}">
               </div>

              <div class="col-md-6"> 
               <label for="reqexp">{{trans('navbar.Required Experience')}}</label>
               <input type="text" id="reqexp" name="reqexperience" placeholder="{{trans('navbar.Required Experience')}}">
              </div>


               <div class="col-md-6">
                   <label for="salary">{{trans('navbar.Salary')}}</label>
                   <input type="text" id="salary" name="salary" placeholder="{{trans('navbar.Salary')}}">
               </div>

              <div class="col-md-12">
                <label for="adtext">{{trans('navbar.Brief')}}</label>
               <textarea name="brief" id="brief" placeholder="{{trans('navbar.Brief')}}" rows="5"></textarea>
               </div>

               <input type="submit" id="button" value="{{trans('navbar.Save')}}">

            </form>
          </div>  
         
      </div> <!-- class row -->
   </div> <!-- container fluid -->

@endsection