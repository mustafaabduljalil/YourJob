@extends('admin.master')

@section('title')
    Jobs
@endsection

@section('content')
	@if(count($errors)>0)
		<ul>
		@foreach($errors->all() as $error)
          <li>{{$error}}</li>
		@endforeach
		</ul>
	@endif

	  @if(count($jobs)<=0)
		<h2 class="text-center">There Are Not Any jobs</h2>
	  @else	
	<h2 class="text-center">Seeker's jobs Table</h2>
	<table class="table">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>Company_Id</th>
	      <th>Title</th>
	      <th>Field</th>
	      <th>Gender</th>
	      <th>Experience</th>
	      <th>Education</th>
	      <th>Salary</th>
	      <th>Brief</th>
	      <!-- <th>Edit</th> -->
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>

		  @foreach($jobs as $job)
		    <tr>
		      <th scope="row">{{$job->id}}</th>
		      <td>{{$job->company_id}}</td>
		      <td>{{$job->title}}</td>
		      <td>{{$job->field}}</td>
		      <td>{{$job->gender}}</td>
		      <td>{{$job->experience}}</td>
		      <td>{{$job->education}}</td>
		      <td>{{$job->salary}}</td>
		      <td>{{$job->brief}}</td>

	      	  <!-- <td><a data-target="#editModel" data-id="{{$job->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Edit</a></td> -->
	      	  <td><a href="/admin/removeJob/{{$job->id}}" class="btn btn-info btn-sm">Delete</a>
	      	  </td>

		    </tr>

		    @endforeach
	  </tbody>
	</table>
	@endif

		   	<!-- Edit job Modal -->
	          <div class="modal fade" id="editModel" role="dialog">
	            <div class="modal-dialog modal-lg">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit job</h4>
	                </div>
	                <form action="/admin/editJob" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-6">
		                   <label for="title">Title </label>
		                   <input type="text"  id="newtitle" name="newtitle" placeholder="New Title" value="{{old('title')}}">
		                  </div>

		                  <div class="col-md-6">
		                   <label for="filed">Field </label>
		                   <input type="text"  id="field" name="newfield" placeholder="New Field" value="{{old('field')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="gender">Gender </label>
		                   <input type="text"  id="gender" name="newgender" placeholder="New Gender" value="{{old('gender')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="experience">Experience </label>
		                   <input type="text"  id="experience" name="newexperience" placeholder="New Experience" value="{{old('experience')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="education">Education </label>
		                   <input type="text"  id="neweducation" name="neweducation" placeholder="New Education" value="{{old('education')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="salary">Salary </label>
		                   <input type="text"  id="salary" name="newsalary" placeholder="New Salary" value="{{old('salary')}}">
		                  </div>

		                  <div class="col-md-6">
		                   <label for="brief">Brief </label>
		                   <textarea rows="5" cols="5" name="newbrief" id="brief" placeholder="New Brief"></textarea>
		                  </div>


		                  <div class="col-md-6">
		                   <label for="id">Id </label>
		                   <input type="text"  id="id" name="id"  >
		                  </div>		                  
		                  
	                  </div>
	                  <div class="modal-footer">
		                 <input type="submit" class="btn-info"  id="button" value="Save">
	                  </div>
	              </form>
	            </div>
	          </div>
	          </div>

@endsection




