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

        $user   =   User::find(Auth::user()->id);

        
      // $student = new Student();
        $education = new Education();
        $exeperience = new  Experience();
        $student= Student::find(Auth::user()->id);
        $student_data = Student::find(Auth::user()->id);
      
        if(!empty($student_data->user_id) && $student_data->is_build==0)
        {
          
           // $student_update = Student::where('user_id',1)->update(['is_build'=>1]);
          // dd($request->all());
            //dd(count($request->company));
           for($i=0;$i<count($request->company); $i++)
           {

            $exp = Experience::create([
                'user_id'   =>    $student->id,
                'profession'=> $request->profession[$i],
                'company'   =>   $request->company[$i],
                'from'      =>   $request->fromDate[$i],
                'to'        =>  $request->toDate[$i],
                'description'   => $request->pro_description[$i]
                ]);
           }

           dd($exp);
          
        
        
          
          
            dd($request->all());
            $exeperience->user_id       = $user->id;
            $exeperience->profession   = $request->input('profession');
            $exeperience->company       = $request->input('company');
            $exeperience->from          = $request->input('from');
            $exeperience->to            = $request->input('to');
            $exeperience->description   = $request->input('description');  
            $experience_data = $exeperience->save();
           
           
            dd($experience_data);
            dd("user exists row updated!".$student_update);


              /* //user data is alreday available here you can upate data or leave this data as it is//
                $imgfile            = $request->file('profile_image');
                $imgname            = time().'_'.$request->input('batchid') .'_'.Auth::user()->name.'.'.$imgfile->getClientOriginalExtension();
                $student->user_id            = Auth::user()->id;
                $student->student_id         = $request->input('student_id');
                $student->batch_id           = $request->input('batchid');
                $student->faculty_name       = $request->input('faculty_name');
                $student->post_apply         = $request->input('post_applying');
                $student->full_name          = $request->input('full_name');
                $student->primary_number     = $request->input('primary_number');
                $student->other_email        = $request->input('other_email');
                $student->secondary_number   = $request->input('secondary_number');
                $student->post_address       = $request->input('address');
                $student->img_path           = 'img/'.$imgname;
                $student->is_build           = 1;
                
                $imgfile->move(public_path('/img'), $imgname);
                */
                
        }
        else
        {
            dd("else");
        }
      
     
  
      // return redirect('home');//->back()->with('msg', 'You cv has been uploaded successfully');   

    }

    public function upload_cv1(Request  $request)
    {
        $student = Student::find(Auth::user()->id);
       
        $student->student_id          = $request->input('student_id');
        $student->batch_id            = $request->input('batchid');
        $student->faculty_name        = $request->input('faculty_name');
        $student->post_apply          = $request->input('post_applying');
        $student->full_name           = $request->input('full_name');
        $student->primary_number      = $request->input('primary_number');
        $student->other_email         = $request->input('other_email');
        $student->secondary_number    = $request->input('secondary_number');
        $student->post_address        = $request->input('address');
       
        $cvfile                 = $request->file('cvupload');
        $imgfile                = $request->file('profile_image');
        $imgname                = time().'_'.$request->input('batchid').'_'.Auth::user()->name.'.'.$imgfile->getClientOriginalExtension();
        $cvname                 = time().'_'.$request->input('batchid').'_'.Auth::user()->name.'.'.$cvfile->getClientOriginalExtension();
      
        $student->img_path       = 'img/'.$imgname;
        $student->cv_path        = 'cv/'.$cvname;
        $student->is_uploaded    = 1;
        $student->user_id        = Auth::user()->id;
        $imgfile->move(public_path('/img'), $imgname);        
        $cvfile->move(public_path('/cv'), $cvname);
 
        $student->save();
        return redirect('home')->with('msg', 'You cv has been uploaded successfully');   
        
    }
    public function upload_cv()
    {
        return view('upload_cv');
    }

}
