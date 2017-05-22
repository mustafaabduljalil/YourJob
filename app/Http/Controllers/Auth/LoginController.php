<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\SocialProvider;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        
        try
        {
            $socialUser = Socialite::driver($provider)->user();
            if(is_null($socialUser->getEMail()))
                abort(404,'Check your account privacy');

        }
        catch(Exception $e){
            return redirect('/');
        }

        $socialProvider=SocialProvider::where('provider_id',$socialUser->getId())->first();


        if(!$socialProvider)
        {
            $user=User::firstOrCreate([

                'email'=>$socialUser->getEmail(),
                'name'=>$socialUser->getName(),

                ]);
            $user->socialProvider()->create([

                'provider_id'=>$socialUser->getId(),   
                'provider'=>$provider,
                ]);
        }
        else
        {
            $user=$socialProvider->user;
        }

        auth()->login($user);


        if(!$user->type)
            return view('auth.checkType');
        else
            return redirect('/');
        // $user->token;
    }



}
