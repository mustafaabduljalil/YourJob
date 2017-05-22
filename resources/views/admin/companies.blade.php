@extends('admin.master')

@section('title')
    Companies
@endsection

@section('content')

	@if(count($errors)>0)
		<ul>
		@foreach($errors->all() as $error)
          <li>{{$error}}</li>
		@endforeach
		</ul>
	@endif

	  @if(count($companies)<=0)
		<h2 class="text-center">There is not companys</h2>
	  @else	
	<h2 class="text-center">Companies Table</h2>
	<table class="table table-company">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>User_Id</th>
	      <th>Name</th>
	      <th>Email</th>
	      <th>Address</th>
	      <th>City</th>	      
	      <th>Country</th>
	      <th>Phone</th>
	      <th>Field</th>
	      <th>Website</th>
	      <th>Logo</th>
	      <!-- <th>Edit</th> -->
	      <th>Jobs</th>
	      <th>Courses</th>

	    </tr>
	  </thead>
	  <tbody>

		  @foreach($companies as $company)
		    <tr>
		      <th scope="row">{{$company->id}}</th>
		      <td>{{$company->user_id}}</td>
		      <td>{{$company->name}}</td>
		      <td>{{$company->email}}</td>
		      <td>{{$company->address}}</td>
		      <td>{{$company->city}}</td>
		      <td>{{$company->country}}</td>
		      <td>{{$company->phone}}</td>
		      <td>{{$company->field}}</td>
		      <td><a href="{{$company->website}}" target="_blank">Website</a></td>	      
		      <td>
              @if($company->logo=="")
<!--                 <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=150&r=pg&d=mm" alt="profile_photo">
 -->            <img src="../images/man.jpg" alt="profile_photo">
              @else
                 <img src="{{Storage::disk('local')->url($company->logo)}}" alt="profile-logo">          
              @endif		      
              </td>
		  
<!-- 		      <td>
		      	<a href="updateCompany/{{$company->email}}" class="btn btn-info btn-sm">Edit</a>
		      </td> -->
		    
		      <td>
				<!-- <a data-target="#jobModel" data-id="{{$company->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Add</a>		  -->
	       		<a href="getJob/{{$company->id}}" class="btn btn-info btn-sm">View</a>
		      </td>
		   
		      <td>
				<!-- <a data-target="#courseModel" data-id="{{$company->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Add</a>		  -->
	       		<a href="getCourse/{{$company->id}}" class="btn btn-info btn-sm">View</a>
		      </td>

		    </tr>


		    @endforeach
	  </tbody>
	</table>
	@endif


		<!-- Add Jobs Modal -->
	          <div class="modal fade" id="jobModel" role="dialog">
	            <div class="modal-dialog modal-lg">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit education</h4>
	                </div>
	                <form action="/admin/addJob" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-6">
		                   <label for="title">Title </label>
		                   <input type="text"  id="title" name="title" placeholder=" Title" >
		                  </div>

		                  <div class="col-md-6">
		                   <label for="filed">Field </label>
		                   <input type="text"  id="field" name="field" placeholder=" Field">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="gender">Gender </label>
		                   <input type="text"  id="gender" name="gender" placeholder=" Gender" >
		                  </div>


		                  <div class="col-md-6">
		                   <label for="experience">Experience </label>
		                   <input type="text"  id="experience" name="experience" placeholder=" Experience" >
		                  </div>


		                  <div class="col-md-6">
		                   <label for="education">Education </label>
		                   <input type="text"  id="education" name="education" placeholder=" Education" >
		                  </div>


		                  <div class="col-md-6">
		                   <label for="salary">Salary </label>
		                   <input type="text"  id="salary" name="salary" placeholder=" Salary" >
		                  </div>

		                  <div class="col-md-6">
		                   <label for="brief">Brief </label>
		                   <textarea rows="5" cols="5" name="brief" id="brief" placeholder="Brief"></textarea>
		                  </div>


		                  <div class="col-md-6">
		                   <label for="id">Id </label>
		                   <input type="text"  id="id" name="id"  >
		                  </div>
		                  
		                  
	                  </div>
	                  <div class="modal-footer">
		                 <input type="submit" class="btn-info"  id="button" value="Add">
	                  </div>
	              </form>
	            </div>
	          </div>
	          </div>



			<!-- Add Courses Modal-->



		<!-- Add Jobs Modal -->
	          <div class="modal fade" id="courseModel" role="dialog">
	            <div class="modal-dialog modal-lg">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit education</h4>
	                </div>
	                <form action="/admin/addCourse" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-6">
		                   <label for="title">Title </label>
		                   <input type="text"  id="title" name="title" placeholder=" Title" value="{{old('title')}}">
		                  </div>

		                  <div class="col-md-6">
		                   <label for="stardate">Start Date </label>
		                   <input type="text"  id="startdate" name="start_date" placeholder="Start Date Field" value="{{old('start_date')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="enddate">End Date </label>
		                   <input type="text"  id="enddate" name="end_date" placeholder="End Date" value="{{old('end_date')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="price">Price </label>
		                   <input type="text"  id="price" name="price" placeholder="Price" value="{{old('price')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="addresss">Address </label>
		                   <input type="text"  id="education" name="address" placeholder=" Education" value="{{old('addresss')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="link">Link </label>
		                   <input type="text"  id="link" name="link" placeholder="Link" value="{{old('link')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="phone">Phone </label>
		                   <input type="text"  id="phone" name="phone" placeholder="Phone" value="{{old('phone')}}">
		                  </div>

		                  <div class="col-md-6">
		                   <label for="brief">Brief </label>
		                   <textarea rows="5" cols="5" name="brief" id="brief" placeholder=" Brief"></textarea>
		                  </div>


		                  <div class="col-md-6">
		                   <label for="id">Id </label>
		                   <input type="text"  id="id" name="id"  >
		                  </div>		                  
		                  
		                  
		                  
	                  </div>
	                  <div class="modal-footer">
		                 <input type="submit" class="btn-info"  id="button" value="Add">
	                  </div>
	              </form>
	            </div>
	          </div>
	          </div>











@endsection