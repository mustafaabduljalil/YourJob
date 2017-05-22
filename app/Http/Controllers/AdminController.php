<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Seeker;
use App\Company;
use App\Job;
use App\Course;
use App\JobSeeker;
use App\CompanySeeker;
use App\Experience;
use App\Education;
use App\Language;
use App\Skill;
use App\Certificate;
use App\User;
use App\Admin;
use App\availableLanguage;


class AdminController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function Users()
    {
    	$users=User::get();
        // dd($users);
    	return view('admin.users')->with('users',$users);
    }


    public function updateUser($email)
    {
        return view('admin.updateUsers')->with('email',$email);
    }


        public function saveUserUpdate(Request $request,$email)
    {
    
        $this->validate($request, [
                        'name' => 'max:20|min:4',
                        'email'=>'email',
                        'password' => 'min:6|max:30',

                ]); 

            $userName=User::where('email',$email)->first();
            $userName->name=($request->newname!=null ? $request->newname : $userName->name);
            $userName->email=($request->newemail!=null ? $request->newemail : $userName->email);
            $userName->password=($request->newpassword!=null ? bcrypt($request->newpassword) : $userName->password);


            if($userName->type=="jobseeker"){
            $seeker=Seeker::where('email',$email)->first();
            $seeker->name=($request->newname!=null ? $request->newname : $seeker->name);
            $seeker->email=($request->newemail!=null ? $request->newemail : $seeker->email);
            $seeker->save();    
            }
            else{
            $company=Company::where('email',$email)->first();
            $company->name=($request->newname!=null ? $request->newname : $company->name);
            $company->email=($request->newemail!=null ? $request->newemail : $company->email);
            $company->save();
            }
            $userName->save();



            return redirect()->route('users');

    }


    public function deleteUser($email)
    {
        $user=User::where('email',$email)->value('type');
        User::where('email',$email)->delete();

        if($user=="jobseeker")
            Seeker::where('email',$email)->delete();  
        else
            Company::where('email',$email)->delete();  
        
        return redirect()->back();      

    }


    public function createSeeker(Request $request)
    {


            $this->validate($request, [
                'name'=>'min:4|max:25|required',
                'email'=>'email|required',
                'password'=>'required|min:6|max:50',
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

            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->type="jobseeker";
            $user->password=bcrypt($request->password);


            $user->save();

            $userId=User::where('email',$request->email)->value('id');

            $seeker=new Seeker;
            $seeker->email=$request->email;
            $seeker->name=$request->name;
            $seeker->user_id=$userId;
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

            return redirect()->back();
    }



    public function createCompany(Request $request)
    {


            $this->validate($request, [
                'name'=>'min:4|max:25|required',
                'email'=>'email|required',
                'password'=>'required|min:6|max:50',
                'address' => 'required|max:50',
                'phone' => 'required|max:15|min:6',
                'country' => 'required|max:20|min:5',
                'field' => 'required|max:40|min:10',
                'city' => 'required|max:15|min:4',
                'image' => 'dimensions:width=150,height=150',
        ]);  

            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->type="company";
            $user->password=bcrypt($request->password);


            $user->save();

            $userId=User::where('email',$request->email)->value('id');

            $company=new Company;
            $company->email=$request->email;
            $company->name=$request->name;
            $company->user_id=$userId;
            $company->address=$request->address;
            $company->website=$request->website;
            $company->phone=$request->phone;
            $company->country=$request->country;
            $company->field=$request->field;
            $company->city=$request->city;
            if ($request->image!=null) {
            $company->image =$request->file('logo')->store('images/companies');
            }

            $company->save();

            return redirect()->back();
    }






    public function jobSeekers()
    {
        $seekers=Seeker::get();
        return view('admin.jobseekers')->with('seekers',$seekers);
    }

    public function downloadCv($Id)
    {
        $pathToFile=Seeker::where('id',$Id)->value('cv');
        return response()->download('storage/'.$pathToFile);
    }

    public function updateSeeker($email)
    {
        return view('admin.updateProfile')->with('email',$email);
    }

    public function saveUpdateSeeker(Request $request,$email)
    {

        $this->validate($request, [
                        'name' => 'max:20|min:4',
                        'address' => 'max:50',
                        'jobtitle' => 'max:20|min:5',
                        'gender' => 'max:6|min:4',
                        'phone' => 'max:15|min:6',
                        'birthdate' => 'max:15|min:8',
                        'country' => 'max:20|min:5',
                        'military' => 'max:15|min:2',
                        'city' => 'max:15|min:4',
                ]); 


            $userName=User::where('email',$email)->first();
            $userName->name=($request->newname!=null ? $request->newname : $userName->name);
            $userName->email=($request->newemail!=null ? $request->newemail : $userName->email);



            $seeker=Seeker::where('email',$email)->first();
            $seeker->name=($request->newname!=null ? $request->newname : $seeker->name);
            $seeker->email=($request->newemail!=null ? $request->newemail : $seeker->email);

            $seeker->address=($request->newaddress!=null ? $request->newaddress : 
                $seeker->address);
            $seeker->job_title=($request->newjobtitle!=null ? $request->newjobtitle : 
                $seeker->job_title);
            $seeker->gender=($request->newgender!=null ? $request->newgender : 
                $seeker->gender);
            $seeker->phone=($request->newphone!=null ? $request->newphone : 
                $seeker->phone);
            $seeker->birthdate=($request->newbirthdate!=null ? $request->newbirthdate : $seeker->birthdate);
            $seeker->country=($request->newcountry!=null ? $request->newcountry : 
                $seeker->country);
            $seeker->city=($request->newcity!=null ? $request->newcity :
                $seeker->city);
            $seeker->military=($request->newmilitary!=null ? $request->newmilitary : 
                $seeker->military);
            if(!is_null($request->file('newcv')))
                $seeker->cv=$request->file('newcv')->store('cv');
            if (!is_null($request->file('newimage'))) 
            $seeker->image =$request->file('newimage')->store('images/users/profile');
            
            $seeker->save();    
            $userName->save();



            return redirect()->route('jobseekers');

    }



    public function companies()
    {
        $companies=Company::get();
        return view('admin.companies')->with('companies',$companies);
    }

    public function updateCompany($email)
    {
        return view('admin.updateCompany')->with('email',$email);
    }

    public function saveUpdateCompany(Request $request,$email)
    {

        //     $this->validate($request, [
        //         'address' => 'max:50',
        //         'city' => 'max:20|min:5',
        //         'country' => 'max:6|min:4',
        //         'phone' => 'max:15|min:6',
        //         'field'=>'required',
        //         'logo' => 'dimensions:width=200,height=200',
        // ]); 

            $userName=User::where('email',$email)->first();
            $userName->name=($request->newname!=null ? $request->newname : $userName->name);
            $userName->email=($request->newemail!=null ? $request->newemail : $userName->email);
            $userName->save();

            $company=Company::where('email',$email)->first();
            $company->name=($request->newname!=null ? $request->newname : $company->name);
            $company->email=($request->newemail!=null ? $request->newemail : $company->email);
            $company->address=($request->newaddress!=null ? $request->newaddress : 
                $company->address);
            $company->phone=($request->newphone!=null ? $request->newphone : 
                $company->phone);
            $company->country=($request->newcountry!=null ? $request->newcountry : 
                $company->country);
            $company->city=($request->newcity!=null ? $request->newcity :
                $company->city);
            $company->field=($request->newfield!=null ? $request->newfield :
                $company->filed);
            $company->website=($request->newwebsite!=null ? $request->newwebsite :
                $company->website); 
            if(! is_null($request->newlogo))   
            $company->logo =$request->file('newlogo')->store('images/companies');

            $company->save();   

            return redirect()->route('companies');

    }

    /////////////////////////////////////Skills/////////////////////////////////////////

    public function skills()
    {
        $skills=Skill::get();

        return view('admin.skills')->with('skills',$skills); 
    }

    public function addSkill(Request $request)
    {
        $skill=new Skill;
        $skill->seeker_id=$request->id;
        $skill->skill=$request->newskill;
        $skill->save();

        return redirect()->back(); 
    }

    public function editSkill(Request $request)
    {
        $skill=Skill::where('id',$request->id)->first();
        $skill->skill=($request->newskill !=null ? $request ->newskill : $skill->skill);
        $skill->save();
        return redirect()->back(); 
    }

    public function getSkill($id)
    {
        $skills=Skill::where('seeker_id',$id)->get();
        return view('admin.skills')->with('skills',$skills);
    }

    public function removeSkill($skill,$seekerId)
    {
        Skill::where(['seeker_id'=>$seekerId,'skill'=>$skill])->delete();
        return redirect()->back();  
    }



    /////////////////////////////////////Languages/////////////////////////////////////////



    public function languages()
    {
        $languages=Language::get();

        return view('admin.languages')->with('languages',$languages); 
    }

    // public function addLanguage(Request $request)
    // {
    //     $language=new Language;
    //     $language->seeker_id=$request->id;
    //     $language->name=$request->newlanguage;
    //     $language->save();

    //     return redirect()->back(); 
    // }    

    public function editLanguage(Request $request)
    {
        $language=Language::where('id',$request->id)->first();
        $language->name=($request->newlanguage !=null ? $request ->newlanguage : $experience->name);
        $language->save();

        return redirect()->back(); 
    }

    public function getLanguage($id)
    {
        $languages=Language::where('seeker_id',$id)->get();
        return view('admin.languages')->with('languages',$languages);
    }

    public function removeLanguage($id)
    {
        Language::where('id',$id)->delete();
        return redirect()->back();  
    }    


    public function getAvaLanguage()
    {
        $languages=availableLanguage::get();
        return view('admin.availableLanguages')->with('languages',$languages);
    }


    public function addLanguage(Request $request)
    {
        $lang=New availableLanguage;
        $lang->name=$request->newlanguage;
        $lang->save();
        return redirect()->back();

    }

    public function removeAvaLanguage($id)
    {
        availableLanguage::where('id',$id)->delete();
        return redirect()->back();  
    } 


    /////////////////////////////////////Experiences/////////////////////////////////////////


    public function experiences()
    {
        $experiences=Experience::get();

        return view('admin.experiences')->with('experiences',$experiences); 
    }

    public function addExperience(Request $request)
    {
        $experience=new Experience;
        $experience->seeker_id=$request->id;
        $experience->company_name=$request->companyName;
        $experience->years=$request->year;
        $experience->save();

        return redirect()->back(); 
    }    

    public function editExperience(Request $request)
    {
        $experience=Experience::where('id',$request->id)->first();
        $experience->company_name=($request->companyName !=null ? $request ->companyName : $experience->company_name);
        $experience->years=($request->year !=null ? $request ->year : $experience->years);

        $experience->save();

        return redirect()->back(); 
    }

    public function getExperience($id)
    {
        $experiences=Experience::where('seeker_id',$id)->get();
        return view('admin.experiences')->with('experiences',$experiences);
    }

    public function removeExperience($id)
    {
        Experience::where('id',$id)->delete();
        return redirect()->back();  
    }   



  /////////////////////////////////////Educations/////////////////////////////////////////


    public function educations()
    {
        $educations=Education::get();

        return view('admin.education')->with('educations',$educations); 
    }

    public function addEducation(Request $request)
    {
        $education=new Education;
        $education->seeker_id=$request->id;
        $education->high_School=$request->high_school;
        $education->university=$request->university;
        $education->grad_year=$request->grad_year;

        $education->save();

        return redirect()->back(); 
    }    

    public function editEducation(Request $request)
    {
        $education=Education::where('id',$request->id)->first();
        $education->high_School=($request->high_school !=null ? $request ->high_school : $education->high_School);
        $education->university=($request->university !=null ? $request ->university : $education->university);
        $education->grad_year=($request->grad_year !=null ? $request ->grad_year : $education->grad_year);

        $education->save();

        return redirect()->back(); 
    }

    public function getEducation($id)
    {
        $educations=Education::where('seeker_id',$id)->get();
        return view('admin.education')->with('educations',$educations);
    }

    public function removeEducation($id)
    {
        Education::where('id',$id)->delete();
        return redirect()->back();  
    }   






  /////////////////////////////////////Certifications/////////////////////////////////////////


    public function certifications()
    {
        $certifications=Certificate::get();

        return view('admin.certifications')->with('certifications',$certifications); 
    }

    public function addCertification(Request $request)
    {
        $certification=new Certificate;
        $certification->seeker_id=$request->id;
        $certification->title=$request->title;
        if(! is_null($request->image))  
            $certification->image=$request->file('image')->store('images/users/certifications');

        $certification->save();

        return redirect()->back(); 
    }    

    public function editCertification(Request $request)
    {
        $certification=Certificate::where('id',$request->id)->first();
        $certification->title=($request->newtitle !=null ? $request ->newtitle : $certification->title);
        // dd($request->newimage);
        if(! is_null($request->newimage))
        $certification->image=$request->file('newimage')->store('images/users/certifications');

        $certification->save();

        return redirect()->back(); 
    }

    public function getCertification($id)
    {
        $certifications=Certificate::where('seeker_id',$id)->get();
        return view('admin.certifications')->with('certifications',$certifications);
    }

    public function removeCertification($id)
    {
        Certificate::where('id',$id)->delete();
        return redirect()->back();  
    }   





//////////////////////////////////////Jobs/////////////////////////////////////////////////




    public function jobs()
    {
        $jobs=Job::get();

        return view('admin.jobs')->with('jobs',$jobs); 
    }

    public function addJob(Request $request)
    {
        $job=new Job;
        $job->company_id=$request->id;
        $job->title=$request->title;
        $job->salary=$request->salary;
        $job->gender=$request->gender;
        $job->experience=$request->experience;
        $job->education=$request->education;
        $job->brief=$request->brief;
        $job->field=$request->field;


        $job->save();

        return redirect()->back(); 
    }       

    public function editJob(Request $request)
    {
        $job=Job::where('id',$request->id)->first();
        $job->title=($request->newtitle !=null ? $request ->newtitle : $job->title);
        $job->field=($request->newfield !=null ? $request ->newfield : $job->field);
        $job->gender=($request->newgender !=null ? $request ->newgender : $job->gender);
        $job->salary=($request->newsalary !=null ? $request ->newsalary : $job->salary);
        $job->experience=($request->newexperience !=null ? $request ->newexperience : $job->experience);
        $job->education=($request->neweducation !=null ? $request ->neweducation : $job->education);
        $job->brief=($request->newbrief !=null ? $request ->newbrief : $job->brief);

        $job->save();
        return redirect()->back(); 
    }

    public function getJob($id)
    {
        $jobs=Job::where('company_id',$id)->get();
        return view('admin.jobs')->with('jobs',$jobs);
    }

    public function removeJob($id)
    {
        Job::where('id',$id)->delete();
        return redirect()->back();  
    }   



///////////////////////////////////Courses//////////////////////////////////////////////////
    public function courses()
    {
        $courses=Course::get();

        return view('admin.courses')->with('courses',$courses); 
    }

    public function addCourse(Request $request)
    {
        $course=new Course;
        $course->company_id=$request->id;
        $course->title=$request->title;
        $course->start_date=$request->start_date;
        $course->end_date=$request->end_date;
        $course->price=$request->price;
        $course->address=$request->address;
        $course->link=$request->link;
        $course->phone=$request->phone;
        $course->brief=$request->brief;

        $course->save();

        return redirect()->back(); 
    }       

    public function editCourse(Request $request)
    {
        $course=Course::where('id',$request->id)->first();
        $course->title=($request->newtitle !=null ? $request ->newtitle 
            : $course->title);
        $course->start_date=($request->newstart_date !=null ? $request ->newstart_date 
            : $course->start_date);
        $course->end_date=($request->newend_date !=null ? $request ->newend_date
            : $course->end_date);
        $course->price=($request->newprice !=null ? $request ->newprice 
            : $course->price);
        $course->address=($request->newaddress !=null ? $request ->newaddress 
            : $course->address);
        $course->phone=($request->newphone !=null ? $request ->newphone 
            : $course->phone);
        $course->link=($request->newlink !=null ? $request ->newlink 
            : $course->link);
        $course->brief=($request->newbrief !=null ? $request ->newbrief 
            : $course->brief);

        $course->save();
        return redirect()->back(); 
    }

    public function getCourse($id)
    {
        $courses=Course::where('company_id',$id)->get();
        return view('admin.courses')->with('courses',$courses);
    }

    public function removeCourse($id)
    {
        Course::where('id',$id)->delete();
        return redirect()->back();  
    }   


    public function adminForm()
    {
        return view('admin.adminForm');
    }



    public function addAdmin(Request $request)
    {
        $admin=new Admin;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->role=$request->role;
        $admin->password=bcrypt($request->password);

        $admin->save();

        return redirect()->route('admins');
    }


    public function displayAdmins()
    {
        $admins=Admin::get();
        return view('admin.admins')->with('admins',$admins);
    }


    public function deleteAdmin($id)
    {
        Admin::where('id',$id)->delete();
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $this->validate($request,[

            'newpassword'=>'required|min:6|max:30',
            'confpassword'=>'required|same:newpassword|min:6|max:30',

            ]);

        $admin=Admin::where('id',Auth::user()->id)->first();
        $admin->password=bcrypt($request->newpassword);

        $admin->save();

        return redirect()->route('admins');

    }



}
