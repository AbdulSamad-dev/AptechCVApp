@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @isset($student)
                        @if($student->is_build==0)
                            <a class="btn btn-primary" href="{{route('create_cv')}}">Create CV</a>
                            @else
                            <span class="badge badge-success" >CV Created</span>
                        @endif
                        @if ($student->is_uploaded==0)
                            <a class="btn btn-success" href="{{route('upload_cv')}}">Upload CV</a>                                
                            @else
                                <span class="badge badge-success" >CV upladed</span>
                            @endif
                    @endisset
                  @empty($student)
                  <a class="btn btn-primary" href="{{route('create_cv')}}">Create CV</a>
                  <a class="btn btn-success" href="{{route('upload_cv')}}">Upload CV</a>  
                  @endempty
                  
                    
                     
            </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @isset($student)
                    <div class="table-responsive-md">
                        <table class="table">
                        <tr><th>Image</th><td> <img src="{{asset($student->img_path)}}" alt="no image" width="100" height="100"></td></tr>
                        <tr><th>CV</th><td> <a class="btn btn-primary" href="{{asset($student->cv_path)}}">Download</a> </td></tr>
                         <tr><th>ID</th><td>{{$student->user_id}}</td></tr>
                         <tr><th>Batch ID</th><td>{{$student->batch_id}}</td></tr>
                         <tr><th>Faculty Name</th><td>{{$student->faculty_name}}</td></tr>
                         <tr><th>Post Applied</th><td>{{$student->post_apply}}</td></tr>
                         <tr><th>Full Name</th><td>{{$student->full_name}}</td></tr>
                         <tr><th>Other Email</th><td>{{$student->other_email}}</td></tr>
                         <tr><th>Primary Email</th><td>{{$student->primary_number}}</td></tr>
                         <tr><th>Secondary Number</th><td>{{$student->secondary_number}}</td></tr>
                         <tr><th>CV Uploaded</th><td>{{$student->is_uploaded}}</td></tr>
                         <tr><th>CV Created </th><td>{{$student->is_build}}</td></tr>

                        </table>
                      </div>
                     
                     
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
