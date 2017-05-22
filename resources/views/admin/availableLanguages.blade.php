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

	<div class="add">
		<a data-toggle="modal" data-target="#addModel" class="btn btn-md btn-info">Add New Langauge</a>
	</div>

	  @if(count($languages)<=0)
		<h2 class="text-center">There Are Not Languages</h2>
	  @else	
	<h2 class="text-center">Available Languages Table</h2>
	<table class="table">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>Name</th>
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>

		  @foreach($languages as $language)
		    <tr>
		      <th scope="row">{{$language->id}}</th>
		      <td>{{$language->name}}</td>
	      	  <td><a href="/admin/removeAvaLanguage/{{$language->id}}" class="btn btn-info btn-sm">Delete</a>
	      	  </td>

		    </tr>

		    @endforeach
	  </tbody>
	</table>
	@endif

		   	<!-- Add Language Modal -->
	          <div class="modal fade" id="addModel" role="dialog">
	            <div class="modal-dialog modal-md">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Add language</h4>
	                </div>
	                <form action="/admin/addLanguage" method="get">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="language">language </label>
		                   <input type="text"  id="language" name="newlanguage" placeholder="New language" >
		                  </div>	                  
		                  
	                  </div>
	                  <div class="modal-footer">
		                 <center><input type="submit" class="btn btn-info btn-md"   value="Add"></center>
	                  </div>
	              </form>
	            </div>
	          </div>
	          </div>

@endsection




