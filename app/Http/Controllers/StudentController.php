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
        dd($id);
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
        $education = new Education();
        $exeperience = new  Experience();
              

        if(!is_null(Student::find(Auth::user()->id)))
        {
            $student = Student::find(Auth::user()->id);
         
            if($student->is_uploaded==0)
            {
              
               $student->objective          = $request->input('objective');
               $imgfile                     = $request->file('profile_image');
               $imgname                     = time().'_'.$request->input('batchid') .'_'.Auth::user()->name.'.'.$imgfile->getClientOriginalExtension();
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
               $student_return              = $student->save();
             
               
           /*   $exeperience->user_id    = $user->id;
              $exeperience->profession = $request->input('profession'); 
              $exeperience->company    = $request->input('company');
              $exeperience->from       = $request->input('from');
              $exeperience->to         = $request->input('to');
              $exeperience->description= $request->input('description');
              $exeperience_return      = $exeperience->save();
              
              $education->user_id       = $user->id;
              $education->certificate   = $request->input('certifcate');
              $education->institute     = $request->input('institute');
              $education->passing_year  = $request->input('passing_year');
              $education_return         = $education->save();
             */
                if(isset($request->company[0]))
                {
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
                }
                if(isset($request->institute[0]))
                {
                    for($i=0;$i<count($request->institute); $i++)
                    {
         
                     $edu = Education::create([
                         'user_id'       =>   $student->id,
                         'certificate'   =>   $request->certificate[$i],
                         'institute'     =>   $request->institute[$i],
                         'passing_year'  =>   $request->passing_year[$i],
                        
                         ]);
                    }
                }
              
               
            }
            elseif($student->is_uploaded==1)
            {
         /*  
            $education->user_id       = $user->id;
            $education->certificate   = $request->input('certifcate');
            $education->institute     = $request->input('institute');
            $education->passing_year  = $request->input('passing_year');
            $education_return         = $education->save();
        
              $exeperience->user_id    = $user->id;
              $exeperience->profession = $request->input('profession'); 
              $exeperience->company    = $request->input('company');
              $exeperience->from       = $request->input('from');
              $exeperience->to         = $request->input('to');
              $exeperience->description= $request->input('description');
              $exeperience_return      = $exeperience->save();
              
           */  
            $student->is_build           = 1;
            $student_return = $student->save();
             
            

                if(isset($request->company[0]))
                { 
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
                    
                }
                if(isset($request->institute[0]))
                {
                   
                    for($i=0;$i<count($request->institute); $i++)
                    {
         
                     $edu = Education::create([
                         'user_id'       =>   $student->id,
                         'certificate'   =>   $request->certificate[$i],
                         'institute'     =>   $request->institute[$i],
                         'passing_year'  =>   $request->passing_year[$i],
                        
                         ]);
                    }
                    
                }
              
            }
            else
            {
                dd("something went wrong");
            }
          
            return redirect('home')->with('msg', 'You cv has been creted successfully');   
        }
        else
        {
          
            $student = new Student();
         
            $student->objective = $request->input('objective');
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

  
                     
            $student->img_path       = 'img/'.$imgname;
          
            $student->is_uploaded    = 0;
            $student->user_id        = Auth::user()->id;
            $imgfile->move(public_path('/img'), $imgname);        
          

            $student_return = $student->save();

           $exeperience->user_id    = $user->id;
           $exeperience->profession = $request->input('profession'); 
           $exeperience->company    = $request->input('company');
           $exeperience->from       = $request->input('from');
           $exeperience->to         = $request->input('to');
           $exeperience->description= $request->input('description');
           $exeperience_return      = $exeperience->save();
           
           $education->user_id       = $user->id;
           $education->certificate   = $request->input('certifcate');
           $education->institute     = $request->input('institute');
           $education->passing_year  = $request->input('passing_year');
           $education_return         = $education->save();
          
             
             if(isset($request->company[0]))
             {
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
             }
             if(isset($request->institute[0]))
             {
                 for($i=0;$i<count($request->institute); $i++)
                 {
      
                  $edu = Education::create([
                      'user_id'       =>   $student->id,
                      'certificate'   =>   $request->certificate[$i],
                      'institute'     =>   $request->institute[$i],
                      'passing_year'  =>   $request->passing_year[$i],
                     
                      ]);
                 }
             }
           
             
             return redirect('home')->with('msg', 'You cv has been creted successfully');   
        }
       

       
        
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
            if($student->is_build==1)
            {
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
         
                $stuent_save = $student->save();

              
            }

        }
        else
        {
            
            $student = new Student();
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
     
            $stuent_save = $student->save();
        }


      
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
