<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Application;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = 'Dashboard';
        if (Auth::user()->hasRole('SuperAdmin')) {
            return view('dashboard',compact('title'));
            return redirect('application');
        }
        if (isset($request->app_id)) {
            Session::put('app_id', $request->app_id); // Store data in session
        }
        
        // 
        // Session::forget('app_id'); // Remove data from session
        $app_id = Session::get('app_id'); // Retrieve data from session
        if (empty($app_id)) {
            $application_data = Application::where('status',1)->get();
            return view('app_select',compact('application_data'));
        }
        if (Auth::user()->hasRole('Zone User')) {
            return redirect('suggestion');
        }
        
        return view('home',compact('title'));
        // $data = Society::all();
        
    }

  
}
