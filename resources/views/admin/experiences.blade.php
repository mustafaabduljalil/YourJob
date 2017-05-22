@extends('admin.master')

@section('title')
    Experiences
@endsection

@section('content')
	@if(count($errors)>0)
		<ul>
		@foreach($errors->all() as $error)
          <li>{{$error}}</li>
		@endforeach
		</ul>
	@endif

	  @if(count($experiences)<=0)
		<h2 class="text-center">There Is Not Seeker's experiences</h2>
	  @else	
	<h2 class="text-center">Seeker's experiences Table</h2>
	<table class="table">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>Seeker_Id</th>
	      <th>Company Name</th>
	      <th>Duration</th>
	      <!-- <th>Edit</th> -->
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>

		  @foreach($experiences as $experience)
		    <tr>
		      <th scope="row">{{$experience->id}}</th>
		      <td>{{$experience->seeker_id}}</td>
		      <td>{{$experience->company_name}}</td>
		      <td>{{$experience->years}}</td>
	      	  <!-- <td><a data-target="#editModel" data-id="{{$experience->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Edit</a></td> -->
	      	  <td><a href="/admin/removeExperience/{{$experience->id}}" class="btn btn-info btn-sm">Delete</a>
	      	  </td>

		    </tr>

		    @endforeach
	  </tbody>
	</table>
	@endif

		   	<!-- Edit experience Modal -->
	          <div class="modal fade" id="editModel" role="dialog">
	            <div class="modal-dialog modal-sm">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit experience</h4>
	                </div>
	                <form action="/admin/editExperience" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="companyName">Company Name </label>
		                   <input type="text"  id="companyname" name="companyName" placeholder="Company Name" value="{{old('companyname')}}">
		                  </div>

		                  <div class="col-md-12">
		                   <label for="duration">Duration </label>
		                   <input type="text"  id="year" name="year" placeholder="Duration In Year" value="{{old('year')}}">
		                  </div>

		                  <div class="col-md-12">
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




