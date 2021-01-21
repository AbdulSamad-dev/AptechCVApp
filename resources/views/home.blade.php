@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                           
                            @if($StdData->is_uploaded != 1)
                            <div class="btn btn-group"><a class="btn btn-success" href="{{route('upload_cv')}}">Upload CV</a><a class="btn btn-primary" href="{{route('create_cv')}}">Create CV</a></div>
                            
                    
                            @else
                            <table class="table">
                                <tr>
                                    <th></th>
                                    <th> Student ID</th>
                                    <th> Student Name</th>
                                    <th> Post for Apply</th>
                                    <th> Status </th>
        
                                
                                </tr>  
                            <tr>
                                <td><img src="{{$StdData->img_path}}" height="50px" width="50px"> </td>
                                <td> {{$StdData->student_id}}</td>
                                <td>{{$StdData->full_name}} </td>
                           
                            <td ><span class="badge badge-danger"> {{$StdData->post_apply}}</span></td>
                            <td><div class="btn btn-group"> <a href="{{URL::asset($StdData->cv_path)}}" class="btn btn-success" target="_blank">Download</a> <a class="btn btn-primary" href="{{route('create_cv')}}">Create CV</a>  </div> </td>
                        
                            @endif
                        
                        </tr>   
                        </table>
      
            
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
