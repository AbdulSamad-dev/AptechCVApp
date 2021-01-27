<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function insert_cv(Request $request)
    {

        $user   =   User::find(Auth::user()->id);
      // $student = new Student();
        $education = new Education();
        $exeperience = new  Experience();
        $student= Student::find(Auth::user()->id);
      
        if(!empty($student->user_id) && $student->is_build==0)
        {
             
         
           
            $student->is_build = 1;
            $student->objective = $request->input('objective');
            $student->save();
            dd($request->all());
           for($i=0;$i<count($request->company); $i++)
           {

                $exp = Experience::create([
                    'user_id'   =>        $student->id,
                    'profession'=>      $request->profession[$i],
                    'company'   =>      $request->company[$i],
                    'from'      =>      $request->fromDate[$i],
                    'to'        =>      $request->toDate[$i],
                    'description' =>  $request->description[$i]
                    ]);
            }
           for($i=0;$i<count($request->institute); $i++)
           {

            $edu = Education::create([
                'user_id'       =>   $student->id,
                'certificate'   =>   $request->certificate[$i],
                'institute'     =>   $request->institute[$i],
                'passing_year'  =>   $request->passing_year[$i],
               
                ]);
           }
          // dd($edu);
          /* $exeperience->user_id       = $user->id;
           $exeperience->profession   = $request->input('profession');
           $exeperience->company       = $request->input('company');
           $exeperience->from          = $request->input('from');
           $exeperience->to            = $request->input('to');
           $exeperience->description   = $request->input('description');  
        
           $experience_data = $exeperience->save();
          */
        }
        else
         { 
        
             //user data is alreday available here you can upate data or leave this data as it is//
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
           // $imgfile->move(public_path('/img'), $imgname);
           }
        
       return redirect('home');//->back()->with('msg', 'You cv has been created successfully');   

    }

    public function upload_cv1(Request  $request)
    {

        if(!is_null(Student::find(Auth::user()->id)))
        {
            $student = Student::find(Auth::user()->id);

            if($student->is_build==0)
            {
                dd("cv is not build ");
            }
            if($student->is_uploaded==1)
            {
                dd("cv is not uploaded");
            }

        }
        else
        {
            $student = new Student();
        }


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

    public function create_cv()
    {
        return view('create_cv');
    }

    public function upload_cv()
    {
        return view('upload_cv');
    }



}
