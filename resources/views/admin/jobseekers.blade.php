@extends('admin.master')

@section('title')
    Job Seekers
@endsection

@section('content')
	@if(count($errors)>0)
		<ul>
		@foreach($errors->all() as $error)
          <li>{{$error}}</li>
		@endforeach
		</ul>
	@endif

	  @if(count($seekers)<=0)
		<h2 class="text-center">There is not seekers</h2>
	  @else	
	<h2 class="text-center">Job Seeker Table</h2>
	<table class="table">
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
	      <th>BirthDate</th>
	      <th>JobTitle</th>
	      <th>Gender</th>
	      <th>Military</th>
	      <th>Image</th>
	      <th>C.V</th>
	      <!-- <th>Edit</th> -->
	      <th>Skil</th>
	      <th>Experience</th>
	      <th>Education</th>
	      <th>Language</th>
	      <th>Certification</th>

	    </tr>
	  </thead>
	  <tbody>

		  @foreach($seekers as $seeker)
		    <tr>
		      <th scope="row">{{$seeker->id}}</th>
		      <td>{{$seeker->user_id}}</td>
		      <td>{{$seeker->name}}</td>
		      <td>{{$seeker->email}}</td>
		      <td>{{$seeker->address}}</td>
		      <td>{{$seeker->city}}</td>
		      <td>{{$seeker->country}}</td>
		      <td>{{$seeker->phone}}</td>
		      <td>{{$seeker->birthdate}}</td>
		      <td>{{$seeker->job_title}}</td>
		      <td>{{$seeker->gender}}</td>
		      <td>{{$seeker->military}}</td>	      
		      <td>
              @if($seeker->image=="")
<!--                 <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=150&r=pg&d=mm" alt="profile_photo">
 -->            <img src="../images/man.jpg" alt="profile_photo">
              @else
                 <img src="{{Storage::disk('local')->url($seeker->image)}}" alt="profile-image">          
              @endif		      
              </td>
		      <td><a href="downloadCv/{{$seeker->id}}">download</a></td>
		      <!-- <td><a href="updateSeeker/{{$seeker->email}}" class="btn btn-info btn-sm">Edit</a></td> -->
		      <td>
				<!-- <a data-target="#skillModel" data-id="{{$seeker->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Add</a>		  -->
	       		<a href="getSkill/{{$seeker->id}}" class="btn btn-info btn-sm">View</a>
		      </td>
		      <td>
				<!-- <a data-target="#expModel" data-id="{{$seeker->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Add</a> -->
		        <a href="getExperience/{{$seeker->id}}" class="btn btn-info btn-sm">View</a>
		      </td>
		      <td>
				<!-- <a data-target="#eduModel" data-id="{{$seeker->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Add</a> -->
				<a href="getEducation/{{$seeker->id}}" class="btn btn-info btn-sm">View</a>
		      </td>
		      <td>
				<!-- <a data-target="#langModel" data-id="{{$seeker->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Add</a> -->
		        <a href="getLanguage/{{$seeker->id}}" class="btn btn-info btn-sm">View</a>
		      </td>
		      <td>
		      	<!-- <a data-target="#certModel" data-id="{{$seeker->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Add</a>/ -->
		        <a href="getCertification/{{$seeker->id}}" class="btn btn-info btn-sm">View</a>
		      </td>

		    </tr>


		    @endforeach
	  </tbody>
	</table>
	@endif



		    <!-- Skill Modal -->
	          <div class="modal fade" id="skillModel" role="dialog">
	            <div class="modal-dialog modal-sm">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Add Skill</h4>
	                </div>
	                <form action="/admin/addSkill" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="skill">SKill </label>
		                   <input type="text"  id="skill" name="newskill" placeholder="New Skill" >
		                  </div>

		                  <div class="col-md-12">
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



		   	<!--Add Language Modal -->
	          <div class="modal fade" id="langModel" role="dialog">
	            <div class="modal-dialog modal-sm">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Add Language</h4>
	                </div>
	                <form action="/admin/addLanguage" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="language">Langauge </label>
		                   <input type="text"  id="language" name="newlanguage" placeholder="New Language" >
		                  </div>

		                  <div class="col-md-12">
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




		   	<!-- Add Experience Modal -->
	          <div class="modal fade" id="expModel" role="dialog">
	            <div class="modal-dialog modal-sm">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Add Experience</h4>
	                </div>
	                <form action="/admin/addExperience" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="Experience">Company Name </label>
		                   <input type="text"  id="experience" name="companyName" placeholder="Company Name">
		                  </div>

		                  <div class="col-md-12">
		                   <label for="duration">Duration </label>
		                   <input type="text"  id="year" name="year" placeholder="Duration In Year">
		                  </div>

		                  <div class="col-md-12">
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



	<!-- Add education Modal -->
	          <div class="modal fade" id="eduModel" role="dialog">
	            <div class="modal-dialog modal-sm">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit education</h4>
	                </div>
	                <form action="/admin/addEducation" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="highschool">High School </label>
		                   <input type="text"  id="highschool" name="high_school" placeholder="High School" >
		                  </div>

		                  <div class="col-md-12">
		                   <label for="uni">University </label>
		                   <input type="text"  id="university" name="university" placeholder="University">
		                  </div>


		                  <div class="col-md-12">
		                   <label for="graduation">Graduation Year </label>
		                   <input type="text"  id="graduation" name="grad_year" placeholder="Graduation Year">
		                  </div>

		                  <div class="col-md-12">
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




	<!-- Add certifications Modal -->
	          <div class="modal fade" id="certModel" role="dialog">
	            <div class="modal-dialog modal-sm">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit education</h4>
	                </div>
	                <form action="/admin/addCertification" method="post" enctype="multipart/form-data">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="title">Title </label>
		                   <input type="text"  id="title" name="title" placeholder="Title">
		                  </div>

		                  <div class="col-md-12">
		                   <label for="image">Certification Image </label>
		                   <input type="file"  id="image" name="image">
		                  </div>

		                  <div class="col-md-12">
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




