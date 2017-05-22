@extends('admin.master')

@section('title')
    Certifications
@endsection

@section('content')
	@if(count($errors)>0)
		<ul>
		@foreach($errors->all() as $error)
          <li>{{$error}}</li>
		@endforeach
		</ul>
	@endif

	  @if(count($certifications)<=0)
		<h2 class="text-center">There Is Not Seeker's certifications</h2>
	  @else	
	<h2 class="text-center">Seeker's certifications Table</h2>
	<table class="table certification-table">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Id</th>
	      <th>Seeker_Id</th>
	      <th>Title</th>
	      <th>Image</th>
	      <!-- <th>Edit</th> -->
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>

		  @foreach($certifications as $certification)
		    <tr>
		      <th scope="row">{{$certification->id}}</th>
		      <td>{{$certification->seeker_id}}</td>
		      <td>{{$certification->title}}</td>
		      <td>
		      @if($certification->image=="")
<!--                 <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=150&r=pg&d=mm" alt="profile_photo">
 -->            <img src="../images/man.jpg" alt="profile_photo">
              @else
                 <img src="{{Storage::disk('local')->url($certification->image)}}" alt="profile-image">          
              @endif
	      	  </td>
	      	  <!-- <td><a data-target="#editModel" data-id="{{$certification->id}}"  data-toggle="modal" class="btn btn-info btn-sm open">Edit</a></td> -->
	      	  <td><a href="/admin/removeCertification/{{$certification->id}}" class="btn btn-info btn-sm">Delete</a>
	      	  </td>

		    </tr>

		    @endforeach
	  </tbody>
	</table>
	@endif

		   	<!-- Edit certification Modal -->
	          <div class="modal fade" id="editModel" role="dialog">
	            <div class="modal-dialog modal-sm">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Edit certification</h4>
	                </div>
	                <form action="/admin/editCertification" method="post" enctype="multipart/form-data">
	                  {{csrf_field()}}
	                  <div class="modal-body">
		                  <div class="col-md-12">
		                   <label for="title">Title </label>
		                   <input type="text"  id="title" name="newtitle" placeholder="Title" value="{{old('title')}}">
		                  </div>

		                  <div class="col-md-12">
		                   <label for="image">Image </label>
		                   <input type="file"  id="image" name="newimage">
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




