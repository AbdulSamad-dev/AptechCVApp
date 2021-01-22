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
    // dd(count($request->edu_certificate));
       //dd($request->edu_certificate[0]);
       //$edu_certificate = Input::get('edu_certificate');
       //$educationArray = array_merge($request->edu_certificate, $request->edu_institute, $request->edu_passing_year);
       //$experienceArray = array_merge($request->pro_profession, $request->pro_company, $request->pro_fromDate,$request->pro_toDate,$request->pro_description);
        //dd($educationArray);
       //dd($experienceArray);
    
     dd($request->education);
          
            //$education[$i] = array("certificate"=>$request->edu_certificate[$i],"institute"=>$request->edu_institute[$i],"passing_year"=>$request->edu_passing_year[$i]);
     

       // dd($Education);

     
       $std = new Student();
       $edu = new Education();
       $exp = new  Experience();


       $user_id = Auth::user()->id;
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
        

       // $std->save();
       // $edu->save();
      //  $exp->save();
       return redirect('home');//->back()->with('msg', 'You cv has been uploaded successfully');   

    }
    public function upload_cv1(Request  $request)
    {
        $std = Student::find(Auth::user()->id);
       
        $stdid                  = $request->input('student_id');
        $batchid                = $request->input('batchid');
        $facultyname            = $request->input('faculty_name');
        $post_applying          = $request->input('post_applying');
        $full_name              = $request->input('full_name');
        $primary_number         = $request->input('primary_number');
        $other_email            = $request->input('other_email');
        $secondary_number       = $request->input('secondary_number');
        $address                = $request->input('address');
        $cvfile                 = $request->file('cvupload');
        $imgfile                = $request->file('profile_image');
        $destinationCvPath      = public_path('/cv');
        $destinationImgPath     = public_path('/img');
        $std->student_id        = $stdid;
        $std->batch_id          = $batchid;
        $std->faculty_name      = $facultyname;
        $std->post_apply        = $post_applying;
        $std->full_name         = $full_name;
        $std->other_email       = $primary_number;
        $std->primary_number    = $other_email;
        $std->secondary_number  = $secondary_number;
        $std->post_address      = $address;
        $std->img_path          = 'img/'.$imgname;
        $std->cv_path           = 'cv/'.$cvname;
        $std->is_uploaded       = 1;
        $std->user_id           = Auth::user()->id;
        $imgname                = time().'_'.$batchid .'_'.Auth::user()->name.'.'.$imgfile->getClientOriginalExtension();
        $cvname                 = time().'_'.$batchid .'_'.Auth::user()->name.'.'.$cvfile->getClientOriginalExtension();
        
        $imgfile->move($destinationImgPath, $imgname);        
        $cvfile->move($destinationCvPath, $cvname);
 
        $std->save();
        return redirect('home')->with('msg', 'You cv has been uploaded successfully');   
        
    }
    public function upload_cv()
    {
        return view('upload_cv');
    }

}
