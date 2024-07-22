<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function socityLogin(Request $request){
        $credentials = $request->only('contact_mobile', 'password','society_id');

         if(Auth::attempt(['contact_mobile' => $credentials['contact_mobile'], 'password' => $credentials['password'],'society_id'=> $credentials['society_id']])){
            $user_id = User::where('contact_mobile',$credentials['contact_mobile'])->first()->id;
            Auth::loginUsingId($user_id);
            return redirect('/home');
        }
        else {
            $this->incrementLoginAttempts($request);
            return redirect()->route('login')->withErrors('Incorrect mobile number or password. Please try again');
        }
    }

}
