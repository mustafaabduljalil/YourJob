@extends('layouts.app')

@section('title')
{{trans('messages.Add Job')}}
@endsection

@section('content')



          <div class="container" companyprofile>
          <div class="row">
    

           
          <div class="col-md-12 title ">
            <h1>{{trans('messages.Update Job')}}</h1>
          </div>
          
          <div class="col-md-8">     

            <form action="/saveUpdate/{{$jobId}}" method="get">
            {{csrf_field()}}
              <div class="col-md-6">
                <label for="jobtitle">{{trans('navbar.Title')}}</label>
                <input type="text" id="jobtitle" name="newtitle" placeholder="{{trans('navbar.Title')}}..">
              </div>
               <div class="col-md-6">
                 <label for="jobtrack">{{trans('navbar.Track')}} </label>
                 <input type="text" id="jobtrack" name="newtrack" placeholder="{{trans('navbar.Track')}}..">
               </div>

               <div class="col-md-6">
                 <label for="position">{{trans('navbar.Available position')}}</label>
                 <input type="number" id="position" name="position">
              </div>

               <div class="col-md-6">
                 <label for="gtype">{{trans('navbar.Gender')}}</label>
                 <input type="text" id="gtype" name="newgender" placeholder="{{trans('navbar.Gender')}}..">
              </div>


               <div class="col-md-6">
                   <label for="salary">{{trans('navbar.Salary')}}</label>
                   <input type="text" id="salary" name="newsalary" placeholder="{{trans('navbar.Salary')}}">
               </div>

              <div class="col-md-12">
                <label for="adtext">{{trans('navbar.Brief')}}</label>
               <textarea name="newbrief" id="brief" placeholder="{{trans('navbar.Brief')}}..." rows="5"></textarea>
               </div>

               <input type="submit" id="button" value="{{trans('navbar.Save')}}">

            </form>
          </div>  
         
      </div> <!-- class row -->
   </div> <!-- container fluid -->

@endsection