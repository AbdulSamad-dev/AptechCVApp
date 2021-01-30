<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {   
        
        $student = Student::where('user_id','=',Auth::user()->id)->first();
        
        if(!is_null($student))
        {
            //dd($student);
            return view('home')->with('student',$student);
        }
        else
        {
            return view('home');
        }
       
    }
    public function cv_build()
    {
        dd("cv builder");
    }
  

}
