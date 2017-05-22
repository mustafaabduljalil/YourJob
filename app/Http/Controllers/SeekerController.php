<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Seeker;
use App\User;
use App\Language;
use App\Skill;
use App\Experience;
use App\Certificate;
use App\JobSeeker;
use App\CompanySeeker;
use App\Job;
use App\Interesting;
use App\availableLanguage;
use App\Company;
use App\Course;

use Auth;

class SeekerController extends Controller
{
    //
    public function storeData(Request $request) { //to store data of seeker

			$this->validate($request, [
	    		'address' => 'required|max:50',
	    		'jobtitle' => 'required|max:20|min:5',
	    		'gender' => 'required|max:6|min:4',
	    		'phone' => 'required|max:15|min:6',
	    		'birthdate' => 'required|max:15|min:8',
	    		'country' => 'required|max:20|min:5',
	    		'military' => 'required|max:15|min:2',
	    		'city' => 'required|max:15|min:4',
	    		'image' => 'dimensions:width=150,height=150',
	    		'cv' => 'required|max:2048',
		]);    	


	    	$seeker=new Seeker;
	    	$seeker->email=Auth::user()->email;
            $seeker->name=Auth::user()->name;
            $seeker->user_id=Auth::user()->id;
			$seeker->address=$request->address;
			$seeker->job_title=$request->jobtitle;
			$seeker->gender=$request->gender;
			$seeker->phone=$request->phone;
			$seeker->birthdate=$request->birthdate;
			$seeker->country=$request->country;
			$seeker->military=$request->military;
			$seeker->city=$request->city;
			if ($request->image!=null) {
			$seeker->image =$request->file('image')->store('images/users/profile');
			}
			$seeker->cv=$request->file('cv')->store('cv');

			$seeker->save();

            flash('Welcome To YourJob');

            return redirect()->route('interesting');


    }

    public function getData() { // to display profile

        //check if user complete his profile
         $user=Seeker::where('email',Auth::user()->email)->value('id');

        // dd($user);

    	 if(is_null($user))
    	 	return view('seekers.baisic-information');
    	 else
    	 {
    		$langs=Seeker::find(Auth::user()->seeker->id)->languages;
            $existlangs=Language::where('seeker_id',Auth::user()->id)->pluck('name');
    		$skills=Seeker::find(Auth::user()->seeker->id)->Skills;
    		$experience=Seeker::find(Auth::user()->seeker->id)->experiences;
            $availablelangs=availableLanguage::whereNotIn('name',$existlangs)->get();
            $seeker=Auth::user()->seeker;


    	  	return view('seekers.profile')
    	  		  ->with([
    	  		  	'seeker'=>$seeker,
    	  		  	'langs'=>$langs,
    	  		  	'skills'=>$skills,
    	  		  	'experience'=>$experience,
                    'availablelangs'=>$availablelangs,
    	  		  	]);
    	 }
    }	

    public function updateData() {
    	return view('seekers.updateProfile');//go to get update data
    }

    public function saveUpdated(Request $request) {//to set updated data and save it

    		$this->validate($request, [
	    		'name' => 'max:20|min:4',
	    		'address' => 'max:50',
	    		'jobtitle' => 'max:20|min:5',
	    		'gender' => 'max:6|min:4',
	    		'phone' => 'max:15|min:6',
	    		'country' => 'max:20|min:5',
	    		'military' => 'max:15|min:2',
	    		'city' => 'max:15|min:4',
		]); 

            $userName=User::find(Auth::user()->id);
            $seeker=Seeker::find(Auth::user()->seeker->id);
            $userName->name=($request->newname!=null ? $request->newname : $userName->name);
            $seeker->name=($request->newname!=null ? $request->newname : $seeker->name);
			$seeker->address=($request->newaddress!=null ? $request->newaddress : 
                Auth::user()->seeker->address);
			$seeker->job_title=($request->newjobtitle!=null ? $request->newjobtitle : 
                Auth::user()->seeker->job_title);
			$seeker->gender=($request->newgender!=null ? $request->newgender : 
                Auth::user()->seeker->gender);
			$seeker->phone=($request->newphone!=null ? $request->newphone : 
                Auth::user()->seeker->phone);
			$seeker->birthdate=($request->newbirthdate!=null ? $request->newbirthdate : Auth::user()->seeker->birthdate);
			$seeker->country=($request->newcountry!=null ? $request->newcountry : 
                Auth::user()->seeker->country);
			$seeker->city=($request->newcity!=null ? $request->newcity :
                Auth::user()->seeker->city);
			$seeker->military=($request->newmilitary!=null ? $request->newmilitary : 
                Auth::user()->seeker->military);
            if(!is_null($request->file('newcv')))
                $seeker->cv=$request->file('newcv')->store('cv');

    		
    		$seeker->save();	
    		$userName->save();

            flash('Your Profile  has been updated');

    	    return redirect('/profile');

    }


    public function StoreLanguage(Request $request) {

    		$lang=new Language;
    		$lang->seeker_id=Auth::user()->seeker->id;
    		$lang->name=$request->lang;
    		$lang->save();
    		return redirect('/profile');

    }


    public function DeleteLanguage($name) {

    		Language::where([
                'seeker_id'=>Auth::user()->seeker->id,
                'name'=>$name
                ])->delete();
    		return redirect('/profile');

    }



    public function StoreSkill(Request $request) {

    		$skill=new Skill;
    		$skill->seeker_id=Auth::user()->seeker->id;
    		$skill->skill=$request->skill;
    		$skill->save();
    		return redirect('/profile');

    }


    public function DeleteSkill($skill) {

    		Skill::where([
                'seeker_id'=>Auth::user()->seeker->id,
                'skill'=>$skill
                ])->delete();
    		return redirect('/profile');

    }


    public function StoreExperience(Request $request) {

    		$experience=new Experience;

    		$experience->seeker_id=Auth::user()->seeker->id;
    		$experience->company_name=$request->company_name;
    		$experience->years=$request->years;
    		$experience->save();
    		return redirect('/profile');

    }


    public function DeleteExperience($company_name) {

    		Experience::where([
                'seeker_id'=>Auth::user()->seeker->id,
                'company_name'=>$company_name
                ])->delete();

    		return redirect('/profile');

    }


    public function ChangePassword(Request $request) {

    	$this->validate($request,[
    		'newPassword'=>'required|max:50',
    		'confPassword'=>'required|same:newPassword'
    		]);

    	$user=User::find(Auth::user()->id);

    	$user->password=bcrypt($request->newPassword);

    	$user->save();
        
        flash('Password has been changed');
    	return redirect('/profile');

    }

    public function EditImage(Request $request) {

        $this->validate($request,[
            'newImage'=>'required|dimensions:width=150,height=150|mimes:jpeg,jpg,png',
            ]);


        $seeker=Seeker::find(Auth::user()->seeker->id);
        if ($request->newImage!=null) {
            $seeker->image =$request->file('newImage')->store('images/users/profile');
            $seeker->save();
        }

        return redirect('/profile');
    }


    public function Home()
    {

        //check if user complete his profile

        $user=Seeker::where('email',Auth::user()->email)->value('id');
        if(is_null($user))
            return view('seekers.baisic-information');

        else
        {

            $companies=CompanySeeker::where('seeker_id',Auth::user()->seeker->id)
                                    ->pluck('company_id');

            $appliedJobs=JobSeeker::where('seeker_id',Auth::user()->seeker->id)->pluck('job_id');
            $jobs=Job::whereIn('company_id',$companies)
                      ->whereNotIn('id',$appliedJobs)
                      ->get();


            $interesting=Interesting::where('seeker_id',Auth::user()->seeker->id)->pluck('name');
            

            // dd($interesting);          

                $interestingCompany=Company::whereIn('track',$interesting)
                                        ->get();

                $interestingCourse=Course::whereIn('track',$interesting)
                                      // ->orWhereIn('title',"%".$interesting."%")
                                      ->get();
                $interestingJobs=Job::whereIn('track',$interesting)->get();                      

                                      // dd($interestingCompany);
            return view('seekers.home')->with([
                'jobs'=>$jobs,
                'interestingCompany'=>$interestingCompany,
                'interestingCourse'=>$interestingCourse,
                'interestingJobs'=>$interestingJobs,

                ]);                        
        }
    }

    public function DownloadCv($id)
    {
        $path=Seeker::where('id',$id)->value('cv');
        return response()->download('storage/'.$path);

    }



    //search results
    public function getSeeker($email) {

        // dd($email);

         if(Auth::user()->email==$email)
            return redirect()->route('profile');
         else
         {
            $seeker=Seeker::where('email',$email)->first();    
            $langs=Language::where('seeker_id',$seeker->id)->get();        
            $skills=Skill::where('seeker_id',$seeker->id)->get();        
            $experience=Experience::where('seeker_id',$seeker->id)->get();        

            return view('seekers.visitSeeker')
                  ->with(['seeker'=>$seeker,
                    'langs'=>$langs,
                    'skills'=>$skills,
                    'experience'=>$experience
                    ]);
              
         }
    }  


    public function interesting()
    {
        return view('seekers.interesting');

    }

    public function saveInteresting(Request $request)
    {

        foreach ($request->interesting as $value) {
            # code...

            $inter=new Interesting;
            $inter->seeker_id=Auth::user()->seeker->id;
            $inter->name=$value;
            $inter->save();

        }

        return redirect('profile');
    }




}


