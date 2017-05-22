<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Company;
use App\Course;
use App\Job;
use App\User;
use App\CompanySeeker;
use Image;




class CompanyController extends Controller
{
    //

	
    public function storeData(Request $request) {

        


    			$this->validate($request, [
    	    		'address' => 'required|max:50',
    	    		'city' => 'required|max:20|min:5',
    	    		'country' => 'required|max:6|min:4',
    	    		'phone' => 'required|max:15|min:6',
    	    		'logo' => 'mimes:jpeg,jpg,png',
    		]);    	


    	    	$company=new Company;
    	    	$company->email=Auth::user()->email;
                $company->name=Auth::user()->name;
    	    	$company->user_id=Auth::user()->id;
    			$company->address=$request->address;
    			$company->phone=$request->phone;
    			$company->country=$request->country;
    			$company->city=$request->city;
    			$company->website=$request->website;
    			$company->track=$request->track;
    			if ($request->logo!=null) {
    			$company->logo =$request->file('logo')->store('images/companies');
    			}

    			$company->save();

    			return redirect('/comprofile');
        

    }

    public function getData() {

        //check if user complete his profile
        $user=Company::where('email',Auth::user()->email)->value('id');


         if(is_null($user))
         {
                return view('companies.baisic-information');
         }
         else
         {
    		$company=Auth::user()->company;
           // $company->logo=Image::make($company->logo)->resize(300, 200);

    	  	return view('companies.profile')->with('company',$company);
    	 }
    }	
 


 public function updateData() {
    	return view('companies.updateProfile');//go to get update data
    }

    public function saveUpdated(Request $request) {//to set updated data and save it

    		$this->validate($request, [
	    		'address' => 'max:50',
	    		'city' => 'max:20|min:5',
	    		'country' => 'max:6|min:4',
	    		'phone' => 'max:15|min:6',
		]); 

            $userName=User::find(Auth::user()->id);
            $company=Company::find(Auth::user()->company->id);
            $userName->name=($request->newname!=null ? $request->newname : $userName->name);
            $company->name=$request->newname;
			$company->address=($request->newaddress!=null ? $request->newaddress : 
                Auth::user()->company->address);
			$company->phone=($request->newphone!=null ? $request->newphone : 
                Auth::user()->company->phone);
			$company->country=($request->newcountry!=null ? $request->newcountry : 
                Auth::user()->company->country);
			$company->city=($request->newcity!=null ? $request->newcity :
                Auth::user()->company->city);
            $company->track=($request->newtrack!=null ? $request->newtrack :
                Auth::user()->company->track);

    		$company->save();	
    		$userName->save();
    	    return redirect('comprofile');

    }    


    public function changePassword(Request $request) {

    	$this->validate($request,[

    		'newPassword'=>'required|max:20|min:6',
    		'confPassword'=>'required|same:newPassword',
    		]);
    	$newPassword=User::find(Auth::user()->id);
    	$newPassword->password=bcrypt($request->newPassword);

    	$newPassword->save();

    	flash('Password has been changed');
    	return redirect('comprofile');
    }

    public function EditLogo(Request $request) {

        $this->validate($request,[
            'newLogo'=>'mimes:jpeg,jpg,png',
            ]);


        $company=Company::find(Auth::user()->company->id);
        if ($request->newLogo!=null) {
            $company->logo =$request->file('newLogo')->store('images/companies');
            $company->save();
        }else {
            $company->logo= '<img src="images/man.jpg" alt="profile_photo">';
        }

        return redirect('/comprofile');
    }

    //search results
    public function getCompany($email) {

         if(Auth::user()->email==$email)
            return redirect()->route('comprofile');
         else
         {
            $company=Company::where('email',$email)->first();
            $name=User::where('email',$email)->value('name');
            if(Auth::user()->type=="jobseeker"){
                $flag=CompanySeeker::where([
                    'seeker_id'=>Auth::user()->seeker->id,
                    'company_id'=>$company->id
                    ])->get();
                            return view('companies.visitCompany')
                  ->with(['company'=>$company,'name'=>$name,'flag'=>$flag]);
            } else{
            return view('companies.visitCompany')
                  ->with(['company'=>$company,'name'=>$name]);
            }

         }
    }  

    public function followCompany($compId,$seekerId)
    {

        $check=CompanySeeker::where([
            'seeker_id'=>$seekerId,
            'company_id'=>$compId
            ])->first();


        if (is_null($check)) {
            # code...
            $follow=new CompanySeeker;
            $follow->company_id=$compId;
            $follow->seeker_id=$seekerId;
            $follow->save();
        }

        return back();


    }

    public function deleteFollowing($compId,$seekerId)
    {
        CompanySeeker::where(['seeker_id'=>$seekerId,'company_id'=>$compId])->delete();
        return back();

    }

    public function getFollowingCompanies()
    {

        $companies=CompanySeeker::where('seeker_id',Auth::user()->seeker->id)
                                ->pluck('company_id');
        $companies=Company::whereIn('id',$companies)->get();
        return view('seekers.follow-company',compact('companies'));         

    }


    public function homeData()
    {
        $jobs=Job::get();
        $courses=Course::get();
        return view('companies.home')->with(['jobs'=>$jobs,'courses'=>$courses]);
    }



    public function test()

    {
        // $img = Image::make(Auth::user()->company->logo)->resize(400, 400)->insert('public/mustafa.jpg');


        $img = Image::make('public/images/mark.jpg')->resize(400, 400);

        return $img;
    }


}
