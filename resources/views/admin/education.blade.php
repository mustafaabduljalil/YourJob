@extends('admin.master')

@section('title')
    Educations
@endsection

@section('content')
	@if(count($errors)>0)
		<ul>
		@foreach($errors->all() as $error)
          <li>{{$error}}</li>
		@endforeach
		</ul>
	@endif

	  @if(count($educations)<=0)
		<h2 class="text-center">There Is Not Seeker's educations</h2>
	  @else	
	<h2 class="text-center">Seeker's educations Table</h2>
	<table class="table">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>Seeker_Id</th>
	      <th>High School</th>
	      <th>University</th>
	      <th>Graduation Year</th>
	      <!-- <th>Edit</th> -->
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>

		  @foreach($educations as $education)
		    <tr>
		      <th scope="row">{{$education->id}}</th>
		      <td>{{$education->seeker_id}}</td>
		      <td>{{$education->high_School}}</td>
		      <td>{{$education->university}}</td>
		      <td>{{$education->grad_year}}</td>
	      	  <!-- <td><a data-target="#editModel" data-id="{{$education->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Edit</a></td> -->
	      	  <td><a href="/admin/removeEducation/{{$education->id}}" class="btn btn-info btn-sm">Delete</a>
	      	  </td>

		    </tr>

		    @endforeach
	  </tbody>
	</table>
	@endif

		   	<!-- Edit education Modal -->
	          <div class="modal fade" id="editModel" role="dialog">
	            <div class="modal-dialog modal-sm">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit education</h4>
	                </div>
	                <form action="/admin/editEducation" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="highschool">High School </label>
		                   <input type="text"  id="highschool" name="high_school" placeholder="High School" value="{{old('highschool')}}">
		                  </div>

		                  <div class="col-md-12">
		                   <label for="uni">University </label>
		                   <input type="text"  id="university" name="university" placeholder="University" value="{{old('university')}}">
		                  </div>


		                  <div class="col-md-12">
		                   <label for="graduation">Graduation Year </label>
		                   <input type="text"  id="graduation" name="grad_year" placeholder="Graduation Year" value="{{old('grad_year')}}">
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




