@extends('admin.master')

@section('title')
	Skills
@endsection

@section('content')
	@if(count($errors)>0)
		<ul>
		@foreach($errors->all() as $error)
          <li>{{$error}}</li>
		@endforeach
		</ul>
	@endif

	  @if(count($skills)<=0)
		<h2 class="text-center">There Is Not Seeker's Skills</h2>
	  @else	
	<h2 class="text-center">Seeker's Skills Table</h2>
	<table class="table">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>Seeker_Id</th>
	      <th>Skill</th>
	      <!-- <th>Edit</th> -->
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>

		  @foreach($skills as $skill)
		    <tr>
		      <th scope="row">{{$skill->id}}</th>
		      <td>{{$skill->seeker_id}}</td>
		      <td>{{$skill->skill}}</td>
	      	  <!-- <td><a data-target="#editModel" data-id="{{$skill->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Edit</a></td> -->
	      	  <td><a href="/admin/removeSkill/{{$skill->id}}" class="btn btn-info btn-sm">Delete</a>
	      	  </td>

		    </tr>

		    @endforeach
	  </tbody>
	</table>
	@endif

		    	          <!-- Edit Modal -->
	          <div class="modal fade" id="editModel" role="dialog">
	            <div class="modal-dialog modal-sm">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit Skill</h4>
	                </div>
	                <form action="/admin/editSkill" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="skill">Skill </label>
		                   <input type="text"  id="skill" name="newskill" placeholder="New Skill" value="{{old('name')}}">
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




