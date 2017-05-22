@extends('admin.master')

@section('title')
    Admins
@endsection



@section('content')

	<div class="add">
		<a href="/admin/adminForm" class="btn btn-md btn-info">Add New Admin</a>
	</div>

	<h2 class="text-center">Admins Table</h2>
	<table class="table table-company">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>Name</th>
	      <th>Email</th>
	      <th>Role</th>
	      <th>Delete</th>

	    </tr>
	  </thead>
	  <tbody>

		  @foreach($admins as $admin)
		    <tr>
		      <th scope="row">{{$admin->id}}</th>
		      <td>{{$admin->name}}</td>
		      <td>{{$admin->email}}</td>
		      <td>{{$admin->role}}</td>
		   
		      <td>
	       		<a href="deleteAdmin/{{$admin->id}}" class="btn btn-info btn-sm">Delete</a>
		      </td>

		    </tr>


		    @endforeach
	  </tbody>
	</table>














@endsection