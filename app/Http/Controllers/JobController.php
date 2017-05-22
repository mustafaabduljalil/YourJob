<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


use App\Mail\SendingCv;
use Auth;
use App\Job;
use App\Company;
use App\Seeker;
use App\JobSeeker;


class JobController extends Controller
{
    //



    public function createJob(){

    	return view('jobs.add-job');
    }

	public function uploadJob(Request $request) {

		$this->validate($request,[

			'jobtitle'=>'required',
			'jobtrack'=>'required',
			'gender'=>'required',
			'reqexperience'=>'required',
			'reqeducation'=>'required',
			'salary'=>'required',
			'position'=>'required',
			'brief'=>'required',		



			]);


		$job=new Job;
		$job->company_id=Auth()->user()->id;
		$job->title=$request->jobtitle;
		$job->track=$request->jobtrack;
		$job->gender=$request->gender;
		$job->experience=$request->reqexperience;
		$job->education=$request->reqeducation;
		$job->salary=$request->salary;
		$job->position=$request->position;
		$job->brief=$request->brief;

		$job->save();

		flash('job has been uploaded');

		return redirect('comprofile');

	}

	//get all jobs except have case 1 (he applied that before)
	public function getJob(){
		
		//check if user complete his profile
		if(Auth::user()->type=='jobseeker')
			$user=Seeker::where('email',Auth::user()->email)->value('id');
		else
			$user=Company::where('email',Auth::user()->email)->value('id');

    	 if(is_null($user))
    	 {
    	 	if(Auth::user()->type=='jobseeker')
    	 		return view('seekers.baisic-information');

			else
    	 		return view('companies.baisic-information');
    	 }
    	 else
    	 {
			$jobs=Job::get();
			if(Auth::user()->type=="jobseeker"){

				if(count($jobs)>0)
				{
					//to get all jobs that applied
				  $existsJobs=JobSeeker::where('seeker_id',Auth::user()->seeker->id)->pluck('job_id');
					//to get remain jobs without applied
				  $jobs=Job::whereNotIn('id',$existsJobs)->get();	
				}
				// echo $jobs;

			}

			return view('jobs.displayJobs')->with('jobs',$jobs);
		}
	}

	//apply job by sending c.v to company mail

	public function ApplyJob($jobId) {

		$jobseeker=new JobSeeker;
		$jobseeker->seeker_id=Auth::user()->seeker->id;
		$jobseeker->job_id=$jobId;
		$jobseeker->save();
		$msg="There is an attachment...Check It!";
		$companyMail=Job::find($jobId)->company->email;

		Mail::to($companyMail)->send(new SendingCv($msg));

		flash('We Wish You Good Luck, Applying is Done');
		return redirect('profile');

	}

	
    public function myJobs() {

    	if(Auth::user()->type=="jobseeker")
    	{
	        $myjobs=JobSeeker::where('seeker_id',Auth::user()->seeker->id)->pluck('job_id');
	        if(count($myjobs)==0)
	        {
	        	$jobs=array();
	        	return view('jobs.seekerJobs')->with('jobs',$jobs);
	        }
	        $jobs=Job::where('id',$myjobs)->get();
	        return view('jobs.seekerJobs')->with('jobs',$jobs);

    	}
    	else
    	{
    		$jobs=Job::where('company_id',Auth::user()->company->id)->get();
    		return view('jobs.companyJobs')->with('jobs',$jobs);

    	}


    }

    public function updateJob($jobId)
    {
    	return view('jobs.updateJob')->with('jobId',$jobId);
    }

    public function saveUpdate(Request $request ,$jobId)
    {

    	$job=Job::find($jobId);

    	$job->title=($request->newtitle==null ? $job->title : $request->newtitle);
    	$job->track=($request->newtrack==null ? $job->track : $request->newtrack);
    	$job->gender=($request->newgender==null ? $job->gender : $request->newgender);
    	$job->experience=($request->newreqexperience==null ? $job->experience : $request->newreqexperience);
    	$job->education=($request->newreqeducation==null ? $job->education : $request->newreqeducation);
    	$job->position=($request->newposition==null ? $job->position : $request->newposition);
    	$job->salary=($request->newsalary==null ? $job->salary : $request->newsalary);
    	$job->brief=($request->newbrief==null ? $job->brief : $request->newbrief);

    	$job->save();

    	flash('Job has been updated');
    	return redirect('/comprofile');


    }


    public function jobTitle($track)
    {

    	$jobs=Job::where('track',$track)->get();

    	return view('jobs.displayJobs')->with('jobs',$jobs);


    }

    public function deleteJob($jobId)
    {
    	Job::where('id',$jobId)->delete();
    	return back();
    }

    public function recommendedJob($jobId)
    {
    	$job=Job::where('id',$jobId)->first();

    	return view('jobs.search',compact(job));
    }


}
