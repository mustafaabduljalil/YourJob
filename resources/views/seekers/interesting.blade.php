@extends('layouts.master')
@section('content')
	
     <div class="container">                          
       <div class="row"> 


          <h2 class="text-center">{{trans('messages.Choose Your Interesting Topics')}}</h2>
          <div class="col-md-8" >     
              <form action="/saveInteresting" method="get">
                  {{csrf_field()}}

                  <input type="checkbox" name="interesting[]" value="Computer Science" />Computer Science</br>
                  <input type="checkbox" name="interesting[]" value="E-commerce" />E-commerce</br>
                  <input type="checkbox" name="interesting[]" value="Economy" />Economy</br>
                  <input type="checkbox" name="interesting[]" value="Education" />Education</br>
                  <input type="checkbox" name="interesting[]" value="IT" />IT</br>
                  <input type="checkbox" name="interesting[]" value="Markting" />Markting</br>
                  <input type="checkbox" name="interesting[]" value="Chemistry" />Chemistry</br>
                  <input type="checkbox" name="interesting[]" value="Medecine" />Medecine</br>
                  <input type="checkbox" name="interesting[]" value="Bear" />Bear</br>
                  
                  <input type="submit" id="button" value="Submit">

              </form>
        </div>
      </div>  
@endsection