@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron border border-dark bg-dark text-light ">
                <div class="card-header">{{ __('Upload CV') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                   <h5>   {{ Auth::user()->name }}</h5>
                   @if (\Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg') !!}</li>
        </ul>
    </div>
@endif
                </div>
                    <h1 class="text-center">Curriculum Vitae</h1>
                    <p><strong>Note:   * field are required</strong></p>
                    <h5>Personal Information</h5><hr/>
                    <form action="{{ route('upload_cv1')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                        <div class="col-sm-3">
                            <label for="">Student ID</label>*
                           
                            <input type="text" name="student_id" id="" class="form-control" required> 
                        </div>
                        <div class="col-sm-3">
                            <label for="">Batch</label>*
                             
                             <select  name="batchid" id="" class="form-control" required>
                                <option value="1802A">1802A</option>
                                <option value="1803E">1803E</option>
                                <option value="1804F">1804F</option>
                                <option value="1807F">1807F</option>
                                <option value="1808A">1808A</option>
                                <option value="1901A">1901A</option>
                                <option value="1901F">1901F</option>
                                <option value="1903B">1903B</option>
                                <option value="1903E">1903E</option>
                                <option value="1906F">1906F</option>
                                <option value="1907B">1907B</option>
                                <option value="1909A">1909A</option>
                                <option value="2001A">2001A</option>
                                <option value="2002E">2002E</option>
                                <option value="2001F">2001F</option>
                                <option value="2008A">2008A</option>
                                <option value="2008E">2008E</option>
                                <option value="2010F">2010F</option>
                                <option value="2011B">2011B</option>
                                <option value="2012F">2012F</option>
                                <option value="2101F">2101F</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Faculty Name</label>*
                            <select  name="faculty_name" id="" class="form-control" required>
                                <option value="">Select Faculty...</option>
                                <option value="Salman Patel">Salman Patel</option>
                                <option value="Rizwan Alvi">Rizwan Alvi</option>
                                <option value="Hussain Ahmed">Hussain Ahmed</option>
                                <option value="Abdul Sami">Abdul Sami</option>
                                <option value="Gullam Mustafa">Gullam Mustafa</option>
                                <option value="Danyal Manzoor">Danyal Manzoor</option>
                                <option value="Abdul Samad">Abdul Samad</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Post applying for</label>*
                            <select name="post_applying" id="" class="form-control" required>
                                <option value="">Choose...</option> 
                                    <option value="Web Developer">Web Developer</option>
                                    <option value="Mobile App Developer">Mobile App Developer</option>
                                    <option value="Graphic Desinge">Graphic Desinger</option>   
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="custom-file">
                                <input type="file" accept=".pdf" class="custom-file-input" id="customFile" name="cvupload" required>
                                <label class="custom-file-label" for="customFile">Choose your cv...</label>
                              </div>
 
                        </div>
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


      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    });
</script>
@endsection
