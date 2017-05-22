<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;
use App\Mail\ContactUs;
use App\Mail\SeekerMsg;
use App\Company;
use Carbon\Carbon;
use App\Job;
use App\Course;
use App\JobSeeker;
use App\User;
use Auth;


class HomeController extends Controller
{
    /**
     * update a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        //to remove jobs and courses every week

        $jobs=Job::get();

        foreach ($jobs as $value) {

            $updated = new Carbon($value->updated_at);
            $now = Carbon::now();
            $difference = $updated->diff($now)->days;
            // echo $difference;
            if($difference>=7)
            {
                Job::where('updated_at',$value->updated_at)->delete();
                JobSeeker::where('job_id',$value->id)->delete();
            }

        }
    

        $courses=Course::get();

        foreach ($courses as $value) {
    
            $updated = new Carbon($value->updated_at);
            $now = Carbon::now();
            $difference = $updated->diff($now)->days;

            if($difference>=7)
            {
                JobSeeker::where('job_id',$value->id)->delete();                   
                Course::where('updated_at',$value->updated_at)->delete();
            }

        }





    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function contactUs(Request $request)
    {

        // Mail::fake();j

        $msg=$request->msg;
        $ourEmail='yourjob@gamil.com';

        Mail::to($ourEmail)->send(new contactUs($msg));

        flash('Thank you to contact us, and get reply with in 24 hours!');
        return redirect()->back();
    }


    public function indexData()
    {
        $logos=Company::pluck('logo');
        $jobs=Job::select('track')->distinct()->get();
        // dd($logos);

        return view('index')->with(['logos'=>$logos,'jobs'=>$jobs]);
    }


    public function checkType(Request $request){

        $user=User::find(Auth::user()->id);
        $user->type=$request->type;
        $user->save();

        return redirect('/');
    }


    public function message(Request $request)
    {
        $seeker = User::where('email',$request->email)->first();
        $seeker_name = $seeker->name;
        $seeker_email = $request->email;
        $msg = $request->msg;

        Mail::to($seeker_email)->send(new SeekerMsg($msg));

        flash('Your message has been sent to'+ $seeker_name);
        return redirect()->back();  
    }

}
