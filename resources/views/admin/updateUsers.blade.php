@extends('layouts.master')
@section('content')

  <h2 class="text-center">Update User Data</h2>
	
     <div class="container">                          
       <div class="row"> 
          
          <div class="col-md-8 col-md-offset-2" >     
                <form action="/admin/saveUserUpdate/{{$email}}" method="post">

                  {{csrf_field()}}
                  <div class="modal-body">

	                  <div class="col-md-6">
	                   <label for="name">Name </label>
	                   <input type="text" id="name" name="newname" placeholder="New Name" value="{{old('name')}}">
	                  </div>

	                  <div class="col-md-6">
	                   <label for="email">Email </label>
	                   <input type="email" id="newemail" name="newemail" value="{{old('email')}}" placeholder="New Email.."> 
	                  </div>

	                  <div class="col-md-6">
	                   <label for="password">Password </label>
	                   <input type="password" id="newpassword" name="newpassword" value="{{old('password')}}" placeholder="New Password.."> 
	                  </div>
	                  <div class="modal-footer">
	                  	<input type="submit" id="button" value="Save">
                  	  </div>
	               
                </div>
              </form>
             </div>

        </div>
      </div>  
@endsection