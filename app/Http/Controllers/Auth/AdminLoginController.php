<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
    	return view('admin.login');

    }

    public function login(Request $request)
    {
    	//validation

    	$email=$request->email;
    	$password=$request->password;

    	$this->validate($request,[

    		'email'=>'required|email',
    		'password'=>'required|max:30|min:6',

    		]);

    	//attempt

		if(Auth::guard('admin')->attempt(['email' => $email,'password' => $password],$request->remember)){
			//successful
			return redirect()->intended(route('admin.dashboard'));

		}
    		
            //unsuccessful 
    		return back();

    }
}
