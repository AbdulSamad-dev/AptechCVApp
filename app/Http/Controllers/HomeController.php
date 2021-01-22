<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
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
       // dd("asdf");
       // $std    =    Student::all();
       //dd($std);
       /*foreach($std as $st)
       {
           //printf($st->id);
           //printf("\n");
           
       }
       */
          if(Student::find(Auth::user()->id) == null){
              $std =new Student();
              $std->user_id= Auth::user()->id;
              Student::all();
              $std->save();
             return view('home')->with('StdData',Student::find(Auth::user()->id));
          }
          
        return view('home')->with('StdData',Student::find(Auth::user()->id));
    }

    public function create_cv()
    {
        return view('create_cv');
    }
    public function insert_cv(Request $request)
    {
        dd($request);
       $std = Student::find(Auth::user()->id);
       
       $stdid              = $request->input('student_id');
       $batchid            = $request->input('batchid');
       $facultyname        = $request->input('faculty_name');
       $post_applying      = $request->input('post_applying');
       $full_name          = $request->input('full_name');
       $primary_number     = $request->input('primary_number');
       $other_email        = $request->input('other_email');
       $secondary_number   = $request->input('secondary_number');
       $address            = $request->input('address');
       $imgfile            = $request->file('profile_image');
       $imgname            = time().'_'.$batchid .'_'.Auth::user()->name.'.'.$imgfile->getClientOriginalExtension();
       $destinationPath    = public_path('/img');
      
       $imgfile->move($destinationPath, $imgname);
     
       $std->student_id =  $stdid;
       $std->batch_id = $batchid;
       $std->faculty_name = $facultyname;
       $std->post_apply = $post_applying;
       $std->full_name = $full_name;
       $std->other_email = $primary_number;
       $std->primary_number = $other_email;
       $std->secondary_number = $secondary_number;
       $std->post_address = $address;
       $std->img_path = 'img/'.$imgname;
       $std->is_build  =1;
       $std->user_id   =  Auth::user()->id;
       $std->save();
       return redirect('home');//->back()->with('msg', 'You cv has been uploaded successfully');   

    }
    public function upload_cv1(Request  $request)
    {
        $std = Student::find(Auth::user()->id);
       
        $stdid              = $request->input('student_id');
        $batchid            = $request->input('batchid');
        $facultyname        = $request->input('faculty_name');
        $post_applying      = $request->input('post_applying');
        $full_name          = $request->input('full_name');
        $primary_number     = $request->input('primary_number');
        $other_email        = $request->input('other_email');
        $secondary_number   = $request->input('secondary_number');
        $address            = $request->input('address');
        $imgfile            = $request->file('profile_image');
        $imgname            = time().'_'.$batchid .'_'.Auth::user()->name.'.'.$imgfile->getClientOriginalExtension();
        $destinationPath    = public_path('/img');
       
        $imgfile->move($destinationPath, $imgname);
      

        $cvfile = $request->file('cvupload');
        //$cvname = time().'.'.$cvfile->getClientOriginalName();
        $cvname = time().'_'.$batchid .'_'.Auth::user()->name.'.'.$cvfile->getClientOriginalExtension();
        $destinationPath = public_path('/cv');
        $cvfile->move($destinationPath, $cvname);

        $std->student_id =  $stdid;
        $std->batch_id = $batchid;
        $std->faculty_name = $facultyname;
        $std->post_apply = $post_applying;
        $std->full_name = $full_name;
        $std->other_email = $primary_number;
        $std->primary_number = $other_email;
        $std->secondary_number = $secondary_number;
        $std->post_address = $address;
        $std->img_path = 'img/'.$imgname;
        $std->cv_path = 'cv/'.$cvname;
        $std->is_uploaded  =1;
        $std->user_id   =  Auth::user()->id;
        $std->save();
        return redirect('home');//->back()->with('msg', 'You cv has been uploaded successfully');   
        

    }
    public function upload_cv()
    {
        return view('upload_cv');
    }

}
