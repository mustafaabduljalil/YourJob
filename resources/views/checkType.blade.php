@extends('layouts.master')

@section('content')
  
     <div class="container">                          
       <div class="row"> 


          <h2 class="text-center">Choose Type</h2>
          <div class="col-md-6 col-md-offset-3" >     
              <form action="/checkType" method="get">
                  {{csrf_field()}}

                  <select name="type" id="type">
                      <option value="jobseeker">{{trans('navbar.jobseeker')}}</option>
                      <option value="company">{{trans('navbar.Company')}}</option>
                  </select>
                  
                  <input type="submit" id="button" value="Done">

              </form>
        </div>
      </div>  
@endsection                     


