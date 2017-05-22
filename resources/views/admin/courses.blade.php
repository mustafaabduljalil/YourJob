@extends('admin.master')

@section('title')
    courses
@endsection

@section('content')
	@if(count($errors)>0)
		<ul>
		@foreach($errors->all() as $error)
          <li>{{$error}}</li>
		@endforeach
		</ul>
	@endif

	  @if(count($courses)<=0)
		<h2 class="text-center">There Are Not Any courses</h2>
	  @else	
	<h2 class="text-center">Seeker's courses Table</h2>
	<table class="table">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>Company_Id</th>
	      <th>Title</th>
	      <th>Start Date</th>
	      <th>End Date</th>
	      <th>Address</th>
	      <th>Phone</th>
	      <th>Price</th>
	      <th>Link</th>
	      <th>Brief</th>
	      <!-- <th>Edit</th> -->
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>

		  @foreach($courses as $course)
		    <tr>
		      <th scope="row">{{$course->id}}</th>
		      <td>{{$course->company_id}}</td>
		      <td>{{$course->title}}</td>
		      <td>{{$course->start_date}}</td>
		      <td>{{$course->end_date}}</td>
		      <td>{{$course->address}}</td>
		      <td>{{$course->phone}}</td>		      
		      <td><a href="{{$course->link}}" target="_blank">Link Of Course</a></td>
		      <td>{{$course->price}}</td>
		      <td>{{$course->brief}}</td>

	      	  <!-- <td><a data-target="#editModel" data-id="{{$course->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Edit</a></td> -->
	      	  <td><a href="/admin/removeCourse/{{$course->id}}" class="btn btn-info btn-sm">Delete</a>
	      	  </td>

		    </tr>

		    @endforeach
	  </tbody>
	</table>
	@endif

		   	<!-- Edit course Modal -->
	          <div class="modal fade" id="editModel" role="dialog">
	            <div class="modal-dialog modal-lg">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit course</h4>
	                </div>
	                <form action="/admin/editCourse" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-6">
		                   <label for="title">Title </label>
		                   <input type="text"  id="newtitle" name="newtitle" placeholder="New Title" value="{{old('newtitle')}}">
		                  </div>

		                  <div class="col-md-6">
		                   <label for="stardate">Start Date </label>
		                   <input type="text"  id="startdate" name="newstart_date" placeholder="Start Date Field" value="{{old('newstart_date')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="enddate">End Date </label>
		                   <input type="text"  id="enddate" name="newend_date" placeholder="End Date" value="{{old('newend_date')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="price">Price </label>
		                   <input type="text"  id="price" name="newprice" placeholder="Price" value="{{old('newprice')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="addresss">Address </label>
		                   <input type="text"  id="neweducation" name="newaddress" placeholder="New Education" value="{{old('newaddresss')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="link">Link </label>
		                   <input type="text"  id="link" name="newlink" placeholder="Link" value="{{old('newlink')}}">
		                  </div>


		                  <div class="col-md-6">
		                   <label for="phone">Phone </label>
		                   <input type="text"  id="phone" name="newphone" placeholder="Phone" value="{{old('newphone')}}">
		                  </div>
		                 

		                  <div class="col-md-6">
		                   <label for="id">Id </label>
		                   <input type="text"  id="id" name="id"  >
		                  </div>
		                 

		                  <div class="col-md-6">
		                   <label for="brief">Brief </label>
		                   <textarea rows="5" cols="5" name="newbrief" id="brief" placeholder="New Brief"></textarea>
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




