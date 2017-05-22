@extends('admin.master')

@section('title')
    Users
@endsection

@section('content')

	<h2 class="text-center">Users Table</h2>


	@if(count($errors)>0)
		<ul>
		@foreach($errors->all() as $error)
          <li>{{$error}}</li>
		@endforeach
		</ul>
	@endif

	
	<div class="add">
		<a data-toggle="modal" data-target="#userModal" class="btn btn-md btn-info">Add New User</a>
	</div>

	@if(count($users)<=0)
		<h2 class="text-center">There is not users</h2>
	@else		


	<table class="table">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>Name</th>
	      <th>Type</th>
	      <th>Email</th>
<!-- 	      <th>Edit</th>	      
 -->	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>

	  
		  @foreach($users as $user)
		    <tr>
		      <th scope="row">{{$user->id}}</th>
		      <td>{{$user->name}}</td>
		      <td>{{$user->type}}</td>
		      <td>{{$user->email}}</td>
		      <!-- <td><a href="updateUser/{{$user->email}}" class="btn btn-info btn-sm">Edit</a></td> -->
		      <td><a href="deleteUser/{{$user->email}}" class="btn btn-danger btn-sm">Delete</a></td>
		    </tr>
		    @endforeach
	  </tbody>
	</table>
	@endif



<!-- start modal -->

<!-- Modal -->
<div class="modal fade bs-modal-sm" id="userModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#jobseeker" data-toggle="tab">Job Seeker</a></li>
              <li class=""><a href="#company" data-toggle="tab">Company</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="jobseeker">
             <form action="createSeeker" method="post" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
               {{csrf_field()}}

            <div class="control-group col-md-6">
              <label class="control-label" for="name">Name:</label>
              <div class="controls">
                <input required="" id="name" name="name" type="text" class="form-control" placeholder="Name" class="input-medium" required="">
              </div>
            </div>

            <div class="control-group col-md-6">
              <label class="control-label" for="email">Email:</label>
              <div class="controls">
                <input required="" id="email" name="email" type="text" class="form-control" placeholder="Email" class="input-medium" required="">
              </div>
            </div>


            <!-- Password input-->
            <div class="control-group col-md-6">
              <label class="control-label" for="Password">Password:</label>
              <div class="controls">
                <input required="" id="passwordinput" name="password" class="form-control" type="password" placeholder="Password" class="input-medium">
              </div>
            </div>


            <div class="control-group col-md-6">
              <label class="control-label" for="address">Address:</label>
              <div class="controls">
                <input required="" id="address" name="address" class="form-control" type="text" placeholder="Address" class="input-medium">
              </div>
            </div>  

            <div class="control-group col-md-6">
              <label class="control-label" for="city">City:</label>
              <div class="controls">
                <input required="" id="city" name="city" class="form-control" type="text" placeholder="City" class="input-medium">
              </div>
            </div>            



            <div class="control-group col-md-6">
              <label class="control-label" for="country">Country:</label>
              <div class="controls">
                <input required="" id="country" name="country" class="form-control" type="text" placeholder="Country" class="input-medium">
              </div>
            </div>  


            <div class="control-group col-md-6">
              <label class="control-label" for="gender">Gender:</label>
              <div class="controls">
                <input required="" id="gender" name="gender" class="form-control" type="text" placeholder="Gender" class="input-medium">
              </div>
            </div>  



            <div class="control-group col-md-6">
              <label class="control-label" for="<?php  ?>">Phone:</label>
              <div class="controls">
                <input required="" id="phone" name="phone" class="form-control" type="text" placeholder="Phone" class="input-medium">
              </div>
            </div> 


            <div class="control-group col-md-6">
              <label class="control-label" for="military">Military:</label>
              <div class="controls">
                <input required="" id="military" name="military" class="form-control" type="text" placeholder="Military" class="input-medium">
              </div>
            </div>  


            <div class="control-group col-md-6">
              <label class="control-label" for="jobtitle">Job Title:</label>
              <div class="controls">
                <input required="" id="jobtitle" name="jobtitle" class="form-control" type="text" placeholder="Job Title" class="input-medium">
              </div>
            </div>  


            <div class="control-group col-md-6">
              <label class="control-label" for="Birthdate">Birthdate:</label>
              <div class="controls">
                <input required="" id="birthdate" name="birthdate" class="form-control" type="text" placeholder="Birthdate" class="input-medium">
              </div>
            </div>  


            <div class="control-group col-md-6">
              <label class="control-label" for="image">Image:</label>
              <div class="controls">
                <input  id="image" name="image" type="file" >
              </div>
            </div>  


             <div class="control-group col-md-6">
              <label class="control-label" for="cd">C.V:</label>
              <div class="controls">
                <input required="" id="cv" name="cv" type="file" >
              </div>
            </div>  




            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="jobseeker"></label>
              <div class="controls">
		            <input type="submit" id="button" value="Create">
              </div>
            </div>
            </fieldset>
            </form>
        </div>

<!-- Company Form -->


        <div class="tab-pane fade" id="company">
            <form action="createCompany" method="post" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
            {{csrf_field()}}

	            <div class="control-group col-md-6">
	              <label class="control-label" for="name">Name:</label>
	              <div class="controls">
	                <input required="" id="name" name="name" type="text" class="form-control" placeholder="Name" class="input-medium" required="">
	              </div>
	            </div>

	            <div class="control-group col-md-6">
	              <label class="control-label" for="email">Email:</label>
	              <div class="controls">
	                <input required="" id="email" name="email" type="text" class="form-control" placeholder="Email" class="input-medium" required="">
	              </div>
	            </div>


	            <!-- Password input-->
	            <div class="control-group col-md-6">
	              <label class="control-label" for="password">Password:</label>
	              <div class="controls">
	                <input required="" id="passwordinput" name="password" class="form-control" type="password" placeholder="Password" class="input-medium">
	              </div>
	            </div>


	            <div class="control-group col-md-6">
	              <label class="control-label" for="address">Address:</label>
	              <div class="controls">
	                <input required="" id="address" name="address" class="form-control" type="text" placeholder="Address" class="input-medium">
	              </div>
	            </div>  

	            <div class="control-group col-md-6">
	              <label class="control-label" for="city">City:</label>
	              <div class="controls">
	                <input required="" id="city" name="city" class="form-control" type="text" placeholder="City" class="input-medium">
	              </div>
	            </div>            



	            <div class="control-group col-md-6">
	              <label class="control-label" for="country">Country:</label>
	              <div class="controls">
	                <input required="" id="country" name="country" class="form-control" type="text" placeholder="Country" class="input-medium">
	              </div>
	            </div>  


	            <div class="control-group col-md-6">
	              <label class="control-label" for="field">Field:</label>
	              <div class="controls">
	                <input required="" id="field" name="field" class="form-control" type="text" placeholder="Field" class="input-medium">
	              </div>
	            </div>  



	            <div class="control-group col-md-6">
	              <label class="control-label" for="phone">Phone:</label>
	              <div class="controls">
	                <input required="" id="phone" name="phone" class="form-control" type="text" placeholder="Phone" class="input-medium">
	              </div>
	            </div> 


	            <div class="control-group col-md-6">
	              <label class="control-label" for="website">Website:</label>
	              <div class="controls">
	                <input required="" id="website" name="website" class="form-control" type="text" placeholder="Website" class="input-medium">
	              </div>
	            </div>    

	            <div class="control-group col-md-6">
	              <label class="control-label" for="logo">Logo:</label>
	              <div class="controls">
	                <input  id="logo" name="logo" type="file" >
	              </div>
	            </div>  

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="company"></label>
              <div class="controls">
		            <center>
                  <input type="submit" class="btn btn-info btn-md" value="Create">
                </center>
              </div>
            </div>

            </fieldset>
            </form>
      </div>
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>









<!-- end modal -->





@endsection