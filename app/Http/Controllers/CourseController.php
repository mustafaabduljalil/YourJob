<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Course;
use App\Seeker;
use Auth;
class CourseController extends Controller
{
    //


	public function addCourse()
	{
		return view('courses.add-course');
	}


    public function storeCourse(Request $request) 
    {


    	$this->validate($request,[

    		'coursetitle'=>'required|max:30',
    		'coursebrief'=>'required|max:100'
    		]);


    	$course=new Course;
    	$course->company_id=Auth::user()->company->id;
    	$course->title=$request->coursetitle;
    	$course->start_date=$request->startdate;
    	$course->end_date=$request->enddate;
    	$course->price=$request->price;
    	$course->link=$request->link;
        $course->track=$request->track;
        $course->capacity=$request->capacity;

    	$course->address=($request->courseaddress==null ? Auth::user()->company->address : $request->courseaddress);
    	$course->phone=($request->coursephone==null ? Auth::user()->company->phone : $request->coursephone);    	
    	$course->brief=$request->coursebrief;

    	$course->save();

    	flash('Your course has been added');

    	return redirect('/comprofile');

}


	public function updateCourse($courseId) {
		return view('courses.updateCourse',compact('courseId'));
	}



	public function saveUpdate(Request $request,$courseId)
	{


    	// $this->validate($request,[

    	// 	'coursetitle'=>'max:30',
    	// 	'coursebrief'=>'max:100'
    	// 	]);

    	$course=Course::find($courseId)->first();

    	$newcourse=Course::find($courseId);
    	

    	$newcourse->title=($request->title==null ? $course->title : 
    		$request->title);
        $newcourse->track=($request->track==null ? $course->track : 
            $request->track);
    	$newcourse->start_date=($request->startdate==null ? $course->startdate : 
    		$request->start_date);    	
    	$newcourse->end_date=($request->enddate==null ? $course->enddate : 
    		$request->end_date); 
    	$newcourse->price=($request->price==null ? $course->price : 
    		$request->price);     	
    	$newcourse->link=($request->link==null ? $course->link : 
    		$request->link); 
    	$newcourse->address=($request->address==null ? $course->address : $request->address); 
        $newcourse->capacity=($request->capacity==null ? $course->capacity : $request->capacity); 
    	$newcourse->phone=($request->phone==null ? $course->phone : 
    		$request->phone); 
    	$newcourse->brief=($request->brief==null ? $course->brief : 
    		$request->brief); 

    	$newcourse->save();


    	flash('Your course has been updated');

    	return redirect('/comprofile');

	}


	public function ourCourses()
	{
		$courses=Course::where('company_id',Auth::user()->company->id)->get();
		return view('courses.ourCourses')->with('courses',$courses);
	}



	public function getCourses() 
	{
        //check if user complete his profile
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
    		$courses=Course::get();
    		return view('courses.displayCourse')->with('courses',$courses);
        }
	}

    public function getCourse($courseId)
    {
        $course=Course::where('id',$courseId)->first();

        return view('courses.getCourse')->with('course',$course);
    }

    public function deleteCourse($courseId)
    {
        Course::where('id',$courseId)->delete();
        return back();
    }

}