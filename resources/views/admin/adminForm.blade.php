@extends('layouts.master')
@section('content')
	
    <h2 class="text-center">Add New Admin</h2>

     <div class="container">                          
       <div class="row"> 
          
          <div class="col-md-8 col-md-offset-2" >     
              <form action="/admin/addAdmin" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="col-md-6">
                   <label for="email">Name</label>
                   <input type="text" id="name" name="name" placeholder="Admin Name..">
                
                  </div>
               
                  <div class="col-md-6">
                   <label for="email">Email</label>
                   <input type="text" id="email" name="email" placeholder="Admin Email..">                 
                  </div>

                 <div class="col-md-6">
                   <label for="role">role</label>
                   <input type="text" id="role" name="role" placeholder="Admin Role..">                
                 </div>

                 <div class="col-md-6">
                   <label for="password">Password</label>
                   <input type="password" id="password" name="password"  placeholder="Admin Password..">
                </div>

                 <input type="submit" id="button" value="Submit">

                 </form>
             </div>
        </div>
      </div>  
@endsection