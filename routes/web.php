<?php
use App\Company;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//////////////////////////////////Admin Panel///////////////////////////////////////////////

/*
Admin Login Accounts:
Email:super@admin.com
Password:123456
//////////
Email:sub@admin.com
Password:123456

*/



Route::group(['prefix'=>'admin'],function(){
	
	Route::get('/','AdminController@index')->name('admin.dashboard');/////home of admin panel
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login-form');/////to login to admin panel
	
	Route::post('/checklogin','Auth\AdminLoginController@login')->name('admin.login');/////to check login
	
	

	////////////////////////////////////Users/////////////////////////////////////////


	Route::get('/users','AdminController@Users')->name('users');/////to display users	

	Route::post('createUser','AdminController@createUser');/////to create user

	Route::get('updateUser/{email}','AdminController@updateUser');/////go to form of update
	
	Route::post('saveUserUpdate/{email}','AdminController@saveUserUpdate');/////to edit user
	
	Route::get('deleteUser/{email}','AdminController@deleteUser');/////to delete user
	
	///////////////////////////////Job Seeker////////////////////////////////////


	Route::get('/jobseekers','AdminController@jobSeekers')->name('jobseekers');	/////to display jobseekers	
	Route::post('createSeeker','AdminController@createSeeker');/////to create job seeker

	Route::get('updateSeeker/{email}','AdminController@updateSeeker');/////go to form of update
	
	Route::post('saveSeekerUpdate/{email}','AdminController@saveUpdateSeeker');/////to save update jobseeker
	Route::get('downloadCv/{Id}','AdminController@downloadCv');	/////to download cv of jobseeker


	////////////////////////////////////////Skills///////////////////////////////////////// 


	Route::get('skills','AdminController@skills')->name('skills');/////to get skills of seekers 

	Route::get('addSkill','AdminController@addSkill');/////to get skills of seekers 
	
	Route::get('getSkill/{id}','AdminController@getSkill');

	Route::get('editSkill','AdminController@editskill')->name('editSkill');/////to get skills of seekers 
	
	Route::get('removeSkill/{id}','AdminController@removeSkill');/////to remove skills


	////////////////////////////////////////Languages///////////////////////////////////////// 


	Route::get('languages','AdminController@languages')->name('languages');/////to get languages of seekers 

	Route::get('getLanguage/{id}','AdminController@getLanguage');

	Route::get('editLanguage','AdminController@editLanguage')->name('editLanguage');//to get langaues of seekers 
	
	Route::get('getAvaLanguage','AdminController@getAvaLanguage')->name('availableLanguages');

	Route::get('removeLanguage/{id}','AdminController@removeLanguage');//to remove languages

	Route::get('addLanguage','AdminController@addLanguage');//to add new languages

	ROute::get('removeAvaLanguage/{id}','AdminController@removeAvaLanguage');


	////////////////////////////////////////Experiences///////////////////////////////////////// 

	Route::get('experiences','AdminController@experiences')->name('experiences');/////to get experiences of seekers 

	Route::get('addExperience','AdminController@addExperience');/////to get experiences of seekers 	

	Route::get('getExperience/{id}','AdminController@getExperience');

	Route::get('editExperience','AdminController@editExperience')->name('editExperience');/////to get experiences of seekers 
	
	Route::get('removeExperience/{id}','AdminController@removeExperience');/////to remove experience


	////////////////////////////////////////Education///////////////////////////////////////// 

	Route::get('educations','AdminController@educations')->name('educations');/////to get educations of seekers 

	Route::get('addEducation','AdminController@addEducation');/////to get educations of seekers 	

	Route::get('getEducation/{id}','AdminController@getEducation');

	Route::get('editEducation','AdminController@editEducation')->name('editEducation');/////to get educations of seekers 
	
	Route::get('removeEducation/{id}','AdminController@removeEducation');/////to remove education
	

	////////////////////////////////////////Certifications///////////////////////////////////////// 
	Route::get('certifications','AdminController@certifications')->name('certifications');/////to get Certifications of seekers 

	Route::post('addCertification','AdminController@addCertification');/////to get Certifications of seekers 	

	Route::get('getCertification/{id}','AdminController@getCertification');

	Route::post('editCertification','AdminController@editCertification')->name('editCertification');/////to get Certifications of seekers 
	
	Route::get('removeCertification/{id}','AdminController@removeCertification');/////to remove Certification	



	//////////////////////////////////////Company////////////////////////////////////////////////
	Route::get('companies','AdminController@companies')->name('companies');/////to display companies	

	Route::get('updateCompany/{email}','AdminController@updateCompany');/////go to form of update
	
	Route::post('saveUpdateCompany/{email}','AdminController@saveUpdateCompany');/////to save update 
	
	Route::post('createCompany','AdminController@createCompany');/////to create company
	
	

	//////////////////////////////Jobs////////////////////////////////////////////////////////////
	Route::get('jobs','AdminController@jobs')->name('jobs');/////to get Jobs of Company 

	Route::get('addJob','AdminController@addJob');/////to get Jobs of Company 	

	Route::get('getJob/{id}','AdminController@getJob');

	Route::get('editJob','AdminController@editJob')->name('editJob');/////to get Jobs of Company 
	
	Route::get('removeJob/{id}','AdminController@removeJob');/////to remove Job




	////////////////////////////////////////Courses/////////////////////////////////////////
	Route::get('courses','AdminController@courses')->name('courses');/////to get Courses of Company 

	Route::get('addCourse','AdminController@addCourse');/////to get Courses of Company 	

	Route::get('getCourse/{id}','AdminController@getCourse');

	Route::get('editCourse','AdminController@editCourse')->name('editCourse');/////to get Courses of Company 
	
	Route::get('removeCourse/{id}','AdminController@removeCourse');/////to remove Course

   ///////////////////////////////////Admins//////////////////////////////////////////////

	Route::get('adminForm','AdminController@adminForm');
	Route::post('addAdmin','AdminController@addAdmin');
	Route::get('displayAdmins','AdminController@displayAdmins')->name('admins');
	Route::get('deleteAdmin/{id}','AdminController@deleteAdmin');
	Route::post('ChangePassword','AdminController@changePassword');



});





/////////////////////////////////////////////End Admin Panel////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////Route Of Website /////////////////////////////////////////


Route::group(['middleware'=>'locale'],function(){



	Route::get('/','HomeController@indexData');

	Auth::routes();

	///// Route::get('/home', 'HomeController@index');

	Route::group(['middleware'=>'auth'],function(){

		/////when register 
		Route::get('/registerInfo',function(){
				///// dd(Auth::user()->type);
			if(Auth::user()->type=="jobseeker")
				return view('seekers.baisic-information');
			else
				return view('companies.baisic-information');

		});


		//////////////////////////////*Job Seeker Routes*/////////////////////////////////////////

		Route::post('/seekerStore','SeekerController@storeData');/////store data of JobSeeker 
		Route::get('/profile','SeekerController@getData')->name('profile');/////JobSeeker Profile
		Route::get('/updateProfile','SeekerController@updateData');/////route to update view
		Route::post('/saveUpdate','SeekerController@saveUpdated');/////to update data
		Route::get('/addLanguage','SeekerController@StoreLanguage');/////to addlanguage
		Route::get('/deleteLanguage/{name}','SeekerController@DeleteLanguage');/////to remove language
		Route::get('/addSkill','SeekerController@StoreSkill');/////to addSkills
		Route::get('/deleteSkill/{skill}','SeekerController@DeleteSkill');/////to remove skills
		Route::get('/addExps','SeekerController@StoreExperience');/////to addExperience
		Route::get('/deleteExps/{company_name}','SeekerController@DeleteExperience');/////to remove experience
		Route::post('/changePass','SeekerController@ChangePassword');/////Chaneg Password
		Route::post('/editImage','SeekerController@EditImage');/////Chaneg Image
		Route::get('/seekerHome','SeekerController@Home');/////Home
		Route::get('/downloadCV/{id}','SeekerController@DownloadCv');/////Home
		Route::get('/getSeeker/{email}','SeekerController@getSeeker');/////results of search
		Route::get('/interesting','SeekerController@interesting')->name('interesting');
		Route::get('/saveInteresting','SeekerController@saveInteresting');
		Route::get('/getInteresting','SeekerController@getInteresting');
		Route::get('/send_msg_to_profile','HomeController@message');



		////////////////////////////////////////*Compnay Routes*//////////////////////////////////

		Route::post('/companyStore','CompanyController@storeData');/////store data of company 
		Route::get('/comprofile','CompanyController@getData')->name('comprofile');/////Company Profile
		Route::get('/updateComProfile','CompanyController@updateData');/////route to update view
		Route::get('/saveComUpdate','CompanyController@saveUpdated');/////to update data
		Route::post('/changeComPass','CompanyController@ChangePassword');/////Chaneg Password
		Route::post('/editLogo','CompanyController@EditLogo');/////Chaneg Image
		Route::get('/getCompany/{email}','CompanyController@getCompany');/////results of search
		Route::get('/followCompany/{compId}/{seekerId}','CompanyController@followCompany');//to create following between users and companies
		Route::get('/deleteFollowing/{compId}/{seekerId}','CompanyController@deleteFollowing');//delete following
		Route::get('/followingCompanines','CompanyController@getFollowingCompanies');//to get following compaies
		Route::get('/companyHome','CompanyController@homeData');//to get and send data to home of company



		//////////////////////////////////Job Routes//////////////////////////////////////////////

		Route::get('/createJob','JobController@createJob');/////to create jobs
		Route::get('/uploadJob','JobController@uploadJob');/////to upload jobs
		Route::get('/getJobs','JobController@getJob');/////to get all jobs and display them
		Route::get('/applyJob/{jobId}','JobController@ApplyJob');/////to apply job
		Route::get('/myJobs','JobController@myJobs');/////to get jobs that u r following
		Route::get('/updateJob/{jobId}','JobController@updateJob');/////to get jobs that u r following
		Route::get('/saveUpdate/{jobId}','JobController@saveUpdate');/////to apply job
		Route::get('/deleteJob/{jobId}','JobController@deleteJob');
		Route::get('/getJobTitle/{track}','JobController@jobTitle');
		Route::get('/recommendedJob/{jobId}','JobController@getJob');





		////////////////////////////////////////Courses Route//////////////////////////////////////

		Route::get('/addCourse','CourseController@addCourse');
		Route::get('/storeCourse','CourseController@storeCourse');
		Route::get('/getCourses','CourseController@getCourses');
		Route::get('/ourCourses','CourseController@ourCourses');
		Route::get('/updateCourse/{courseId}','CourseController@updateCourse');
		Route::get('/saveUpdateCourse/{courseId}','CourseController@saveUpdate');
		Route::get('/getCourse/{courseId}','CourseController@getCourse');
		ROute::get('/deleteCourse/{courseId}','CourseController@deleteCourse');


		///////////////////////////////////////Search Route///////////////////////////////////////

		Route::get('/search','SearchController@Search');


		////////////////////////////////////////////////Contact Us////////////////////////////////


		Route::get('/contactForm',function(){
			return view('contact-us');
		});
		Route::get('/contactUs','HomeController@contactUs');


	});

	////////////////////////////////socialite//////////////////////////////////////////////////////
	Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('social');
	Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
	Route::get('checkType', 'HomeController@checkType');//to determine type of user when login with social


});
////////////////////////////////////Languages of App/////////////////////////////////////////////


Route::get('setlocale/{locale}',function($locale){
	\Session::put('locale',$locale);//to store new language in session and run it 
	 return back();
});


Route::get('/test', 'CompanyController@test');