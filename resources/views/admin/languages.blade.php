@extends('admin.master')

@section('title')
    Languages
@endsection

@section('content')
	@if(count($errors)>0)
		<ul>
		@foreach($errors->all() as $error)
          <li>{{$error}}</li>
		@endforeach
		</ul>
	@endif

	  @if(count($languages)<=0)
		<h2 class="text-center">There Is Not Seeker's Languages</h2>
	  @else	
	<h2 class="text-center">Seeker's Languages Table</h2>
	<table class="table">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>Seeker_Id</th>
	      <th>Name</th>
	      <!-- <th>Edit</th> -->
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>

		  @foreach($languages as $language)
		    <tr>
		      <th scope="row">{{$language->id}}</th>
		      <td>{{$language->seeker_id}}</td>
		      <td>{{$language->name}}</td>
	      	  <!-- <td><a data-target="#editModel" data-id="{{$language->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Edit</a></td> -->
	      	  <td><a href="/admin/removeLanguage/{{$language->id}}" class="btn btn-info btn-sm">Delete</a>
	      	  </td>

		    </tr>

		    @endforeach
	  </tbody>
	</table>
	@endif


			<!-- Edit Language Modal -->
	          <div class="modal fade" id="editModel" role="dialog">
	            <div class="modal-dialog modal-sm">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit language</h4>
	                </div>
	                <form action="/admin/editLanguage" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="language">language </label>
		                   <input type="text"  id="language" name="newlanguage" placeholder="New language" value="{{old('name')}}">
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




