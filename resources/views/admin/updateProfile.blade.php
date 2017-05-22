@extends('layouts.master')
@section('content')

  <h2 class="text-center">Update Job Seeker Data</h2>
	
     <div class="container">                          
       <div class="row"> 
          
          <div class="col-md-8 col-md-offset-2" >     
              <form action="/admin/saveSeekerUpdate/{{$email}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}


                  <div class="col-md-6">
                   <label for="name">Name </label>
                   <input type="text" id="name" name="newname" placeholder="New Name" value="{{old('name')}}">
                  </div>

                  <div class="col-md-6">
                   <label for="email">Email </label>
                   <input type="email" id="email" name="newemail" placeholder="New Email" value="{{old('name')}}">
                  </div>

                  <div class="col-md-6">
                   <label for="jobtitle">Job Title </label>
                   <input type="text" id="jobtitle" name="newjobtitle" value="{{old('jobtitle')}}" placeholder="New jobTitle.."> 
                  </div>
               
                  <div class="col-md-6">
                   <label for="gtype">Gender</label>
                   <input type="text" id="gtype" name="newgender" value="{{old('gender')}}" placeholder="New Gender..">                 
                  </div>

                 <div class="col-md-6">
                   <label for="birth">Birthdate</label>
                   <input type="text" id="birth" name="newbirthdate" value="{{old('birthdate')}}" placeholder="New Birthdate..">                
                 </div>

                 <div class="col-md-6">
                   <label for="residence">Country</label>
                   <input type="text" id="residence" name="newcountry" value="{{old('country')}}" placeholder="New Residence..">
                </div>
                  
                 <div class="col-md-6"> 
                   <label for="state">military</label>
                   <input type="text" id="state" name="newmilitary" value="{{old('military')}}" placeholder="New State..">
                 </div>
                  
                 <div class="col-md-6">
                   <label for="city">City</label>
                   <input type="text" id="city" name="newcity" value="{{old('city')}}" placeholder="New City..">
                 </div>
                  
                 <div class="col-md-6"> 
                   <label for="mobile">Phone</label>
                   <input type="text" id="phone" name="newphone" value="{{old('phone')}}" placeholder="New Mobile..">
                 </div>
                  
                 <div class="col-md-6">
                   <label for="address">Address</label>
                   <input type="text" id="address" name="newaddress" value="{{old('address')}}" placeholder="New Address..">
                </div>
                <div class="col-md-6">
                   <label for="cv">C.V</label>
                   <input type="file" id="newcv" name="newcv">
                </div>
                  
                <div class="col-md-6">
                   <label for="image">Image</label>
                   <input type="file" id="newimage" name="newimage">
                </div>                  

                 <input type="submit" id="button" value="Submit">

                 </form>
             </div>

        </div>
      </div>  
@endsection