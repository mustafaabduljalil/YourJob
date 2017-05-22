@extends('layouts.master')
@section('content')

  <h2 class="text-center">Update Company Data</h2>
	
     <div class="container">                          
       <div class="row"> 
          
          <div class="col-md-8 col-md-offset-2" >     
             
                <form action="/admin/saveUpdateCompany/{{$email}}" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <div class="modal-body">

                      <div class="col-md-6">
                       <label for="name">Name </label>
                       <input type="text" id="name" name="newname" placeholder="New Name" value="{{old('name')}}">
                      </div>

                      <div class="col-md-6">
                       <label for="email">Email </label>
                       <input type="email" id="newemail" name="newemail" value="{{old('email')}}" placeholder="New Email.."> 
                      </div>

                   
                      <div class="col-md-6">
                       <label for="gtype">Gender</label>
                       <input type="text" id="gtype" name="newgender" value="{{old('gender')}}" placeholder="New Gender..">                 
                      </div>

                     <div class="col-md-6">
                       <label for="city">City</label>
                       <input type="text" id="city" name="newcity" value="{{old('city')}}" placeholder="New City..">
                     </div>

                     <div class="col-md-6">
                       <label for="address">Address</label>
                       <input type="text" id="address" name="newaddress" value="{{old('address')}}" placeholder="New Address..">
                    </div>

                     <div class="col-md-6"> 
                       <label for="mobile">Phone</label>
                       <input type="text" id="phone" name="newphone" value="{{old('phone')}}" placeholder="New Mobile..">
                     </div>
                      

                     <div class="col-md-6">
                       <label for="residence">Country</label>
                       <input type="text" id="residence" name="newcountry" value="{{old('country')}}" placeholder="New Residence..">
                    </div>
                      
                     <div class="col-md-6"> 
                       <label for="field">Field</label>
                       <input type="text" id="field" name="newfield" value="{{old('field')}}" placeholder="New Field..">
                     </div>
                      
                     <div class="col-md-6"> 
                       <label for="website">Website</label>
                       <input type="text" id="website" name="newwebsite" value="{{old('website')}}" placeholder="New Website..">
                     </div>

                    <div class="col-md-6">
                       <label for="logo">Logo</label>
                       <input type="file" id="newlogo" name="newlogo">
                    </div>
                      
                    </div>
                    <div class="modal-footer">
                     <input type="submit" id="button" value="Save">
                    </div>
                  </div>
                </form>
             </div>

        </div>
      </div>  
@endsection