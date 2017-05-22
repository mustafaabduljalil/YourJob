<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seeker;
use App\Company;
use Auth;
use App\Job;
use App\Course;
use App\JobSeeker;
use App\User;

class SearchController extends Controller
{
    //


    public function Search(Request $request)
    {


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

	    	$search=$request->search;
			
			if($request->purpose=="seeker"){
				
				$seekers=Seeker::where('name','LIKE','%'.$search.'%')
			               ->get();	 
			               // dd($companies);
			    return view('seekers.search')->with('seekers',$seekers);	           
			}		


			else if($request->purpose=="company"){
				
				$companies=Company::where('track','LIKE','%'.$search.'%')
								  ->orWhere('name','LIKE','%'.$search.'%')
			               		  ->get();	 
			               // dd($companies);
			    return view('companies.search')->with('companies',$companies);	           
			}



			else if($request->purpose=="jobs"){
				
				$jobs=Job::where('track','LIKE','%'.$search.'%')
					     ->orWhere('title','LIKE','%'.$search.'%')
				 		 ->get();
			    return view('jobs.search')->with('jobs',$jobs);	

			}
			else if($request->purpose=="courses"){
	    		
	    		$courses=Course::where('track','LIKE','%'.$search.'%')
	    					   ->orWhere('title','LIKE','%'.$search.'%')
	    				   	   ->get();	
	    		return view('courses.search')->with('courses',$courses);			   

	    	}


			

	    	}
	    }

}
