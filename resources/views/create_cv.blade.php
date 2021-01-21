@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron border border-dark bg-dark text-light ">
                <div class="card-header">{{ __('Create CV') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                   <h5> {{ __('Welcome Abdul Samad!') }}</h5>
                </div>
                    <h1 class="text-center">Create your CV</h1>
                    <p><strong>Note:   * field are required</strong></p>
                    <h5>Personal Information</h5><hr/>
                    <form action="{{ route('insert_cv')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                        <div class="col-sm-3">
                            <label for="">Student ID</label>*
                            <input type="text" name="student_id" id="" class="form-control" required> 
                        </div>
                        <div class="col-sm-3">
                            <label for="">Batch</label>*
                             <input type="text" name="batch" id="" class="form-control" required> 
                        </div>
                        <div class="col-sm-3">
                            <label for="">Faculty Name</label>*
                            <input type="text" name="faculty_name" id="" class="form-control" required> 
                        </div>
                        <div class="col-sm-3">
                            <label for="">Post applying for</label>*
                            <select name="post_applying_for" id="" class="form-control" required>
                                <option value="">Choose...</option> 
                                    <option value="1">Web Developer</option>
                                    <option value="2">Mobile App Developer</option>
                                    <option value="3">Graphic Desinger</option>   
                              </select>      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Full Name</label>*
                                        <input type="text" name="full_name" id="" class="form-control" required>      
                                    </div>
                                    <div class="form-group">
                                        <label for="">Primary Number</label>*
                                        <input type="text" name="primary_number" id="" class="form-control" required>      
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Other Email</label>
                                        <input type="email" name="other_email" id="" class="form-control">  
                                    </div>
                                    <div class="form-group">
                                        <label for="">Secondary Number</label>
                                        <input type="text" name="secondary_number" id="" class="form-control">      
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-sm-5"></div>
                                <div class="col-sm-4">
                                    <img id="blah" src="./img/avatar.png" alt="no  Image" class="img-thumnail" height="150px" width="150px">   
                                    <input type="file" name="profile_image" id="imgInp" accept=".png,.jpg" required>
 
                                
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="">Postal home address</label>
                             <textarea type="text" name="address" rows="5"  cols="12" id=""   class="form-control" required></textarea>
                            </div>
                         </div>
                    </div>

                    <h5>Education</h5><hr/>
                    <h6>Career Objective</h6>
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="form-group">
                             <textarea type="text" name="objective" rows="5" id=""   class="form-control" required></textarea>
                            </div>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Certifacate</label>
                                <select name="certifcate" id="certifcate" class="form-control" required>
                                    <option value=""></option>
                                    <option value="1">Matric</option>
                                    <option value="2">Intermediate</option>
                                    <option value="3">Graduate</option>
                                    <option value="4">Masters</option>
                                </select>
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Institute</label>
                                <input type="text" name="institute" id="institute" class="form-control" placeholder="" required>  
                            </div>  
                        </div>
                    </div>

                    <div class="row" id="">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Passing Year</label>
                                <input type="month" name="passing_year" id="passing_year" class="form-control">      
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="still_studing">Are you still studing?</label>&nbsp;&nbsp;
                                    <input class="form-check-input" type="checkbox" name="still_studing" id="still_studing" value="option1">
                                 </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button name="add_education" id="add_education" class="btn btn-success">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table bg-dark text-light">
                            <thead>
                              <tr>
                                <th scope="col">S.NO</th>
                                <th scope="col">CERTIFICATE</th>
                                <th scope="col">INSTITUTE NAME</th>
                                <th scope="col">PASSING YEAR</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody id="eucation_row">
                              
                                
                          </tbody>
                        </table>
                    </div>
                  
                  
                    <h5>Work Experience</h5><hr/>
          
                  
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Profession</label>
                                <select name="profession" id="profession" class="form-control" required>
                                    <option value=""></option>
                                    <option value="1">Web Developer</option>
                                    <option value="2">Android Developer</option>
                                    <option value="3">Graphic Designer</option>
                                    <option value="4">Web Designer</option>
                                </select>
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Company</label>
                                <input type="text" name="company" id="company" class="form-control" placeholder="" required>  
                            </div>  
                        </div>
                    </div>
                    <div class="row" id="">
                     
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">From</label>
                                <input type="date" name="from" id="from" class="form-control" required>    
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">To</label>
                                <input type="date" name="to" id="to" class="form-control">    
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="still_studing">Are you still working?</label>&nbsp;&nbsp;
                                    <input class="form-check-input" type="checkbox" name="still_working" id="still_working" value="option1">
                                 </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button name="add_experience" id="add_experience" class="btn btn-success">+</button>
                            </div>
                        </div>
                    </div>
                    <h6><b>Job Description</b></h6>
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="form-group">
                             <textarea type="text"  name="description" rows="5" id="description"   class="form-control" required></textarea>
                            </div>
                         </div>
                    </div>
                    <div class="row">
                        <table class="table bg-dark text-light">
                            <thead>
                              <tr>
                                <th scope="col">S.NO</th>
                                <th scope="col">Profession</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody id="experience_row">
                              
                                
                          </tbody>
                        </table>
                    </div>
                    <button class="btn btn-lg btn-success" type="submit">Submit</button>

                </form>
            </div>
        </div>
    
    </div>
</div>

<script>

    
    $(function(){

        $("#still_studing").change(function() {

            if(this.checked) {
                $("#passing_year").prop('disabled', true);
            }
            else{
                $("#passing_year").prop('disabled', false);
            }
        });

        var i=1;
        $("#add_education").on("click",function(){
           // alert("hi"); $("select#certifcate option").filter(":selected").text();
            var certificate =  $("#certifcate").find(':selected').text();
            var institute =  $("#institute").val();
            var passing_year =  $("#passing_year").val();
            
            if(certificate=="" || institute=="" || passing_year=="")
            {
                alert("All fields are required");
                return false;
            }
        
            $("#eucation_row").append("<tr><th scope='row'>"+i+"</th><td>"+certificate+"</td><td>"+institute+"</td><td>"+passing_year+"</td><td><button id=btn_add_edu class='btn btn-small btn-danger'>x</button></td></tr>");                   
                                  i++;
             $("option:selected").prop("selected", false)
            $('#institute').val('');
        

        });
        $("table").on('click','#btn_add_edu',function(){
         // get the current row
        // var currentRow=$(this).closest("tr"); 
         $(this).closest('tr').remove();    
    });

    $("#still_working").change(function() {
            if(this.checked) {
                $("#joining_date").prop('disabled', true);
            }
            else{
                $("#joining_date").prop('disabled', false);
            }
        });
         var i=1;


         
        $("#add_experience").on("click",function(){
           // alert("hi"); $("select#certifcate option").filter(":selected").text();
            var profession      =  $("#profession").find(':selected').text();
            var company         =  $("#company").val();
            var fromDate        =  $("#from").val();
            var toDate          =  $("#to").val();
            var description     = $("#description").val();

            if(profession=="" || company=="" || fromDate=="" || toDate=="" || description=="")
            {
                alert("All fields are required");
                return false;
            }
            $("#experience_row").append("<tr><th scope='row'>"+i+"</th><td>"+profession+"</td><td>"+company+"</td><td>"+fromDate+"</td><td>"+toDate+"</td><td>"+description+"</td><td><button id=btn_add_exp class='btn btn-small btn-danger'>x</button></td></tr>");                   
                                  i++;

            $("#profession").find(':selected').text("");
            $("#company").val("");
            $("#from").val("");
            $("#to").val("");
            $("#description").val("");

        });
        $("table").on('click','#btn_add_exp',function(){
         // get the current row
        // var currentRow=$(this).closest("tr"); 
         $(this).closest('tr').remove();    
    });




    function readURL(input) 
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();       
            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
        $("#imgInp").change(function() {
        readURL(this);
        });
    });
</script>
@endsection
