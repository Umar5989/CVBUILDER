@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                {{-- <div class="card-header">{{ __('Your CV is ready') }}</div> --}}
                
                    <div class="card-body content" id="content" >
                        <div class="">
                            <div class="form-group">
                                <img style="border-radius: 50%;height: 150px;width:150px" src="{{ asset('uploads/images/' . $cvs->file) }}" class="img-fluid">
                            </div>
                        </div>
                       

                            <h4 class="pr-3"><b>Name:</b></h4>  
                            <p>{{$cvs->name}} </p>

                            <h4 class="pr-3"><b>Phone Number:</b></h4>  
                            <p>{{$cvs->number}} </p>

                            <h4 class="pr-3"><b>Gender:</b></h4>  
                            <p>{{$cvs->gender}} </p>
                        
                        
                            <h4 class="pr-3"><b>Email:</b></h4>  
                            <p>{{$cvs->email}} </p>
                        
                    
                            <h4 class="pr-3"><b>Nationality:</b></h4>    
                            <p>{{$cvs->nation}} </p>
                        
                            <h4 class="pr-3"><b>Address:</b></h4>   
                            <p>{{$cvs->address}} </p>
                        
                        
                            <h4 class="text-uppercase "><b>About me:</b></h4>
                            <p>{{$cvs->about}}</p>
                        
                            
                            <h3 class="text-uppercase mt-5 text-center "><b>Projects:</b></h3>
                            <p> {!! $cvs->projects !!}</p>

                            <h3 class="text-uppercase mt-5 text-center "><b>Education:</b></h3>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">College/Universty</th>
                                    <th scope="col">Degree</th>
                                    <th scope="col">Start date</th>
                                    <th scope="col">End date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>{{ $cvs->collegeName}}</th>
                                    <th>{{ $cvs->intermediate}}</th>
                                    <th>{{ $cvs->intermediatestart}}</th>
                                    <th>{{ $cvs->intermediateend}}</th>
                                </tr>
                                <tr>
                                    <th>{{ $cvs->Universtyname}}</th>
                                    <th>{{ $cvs->Bachelor}}</th>
                                    <th>{{ $cvs->Universtystart}}</th>
                                    <th>{{ $cvs->Universtyend}}</th>
                                </tr>
                                
                                </tbody>
                            </table>

                            <h3 class="text-uppercase mt-5 mb-4 text-center "><b>Work Experience:</b></h3>
                    
                                <h4 class=""><b>Designation:</b></h4>
                                <p>{{$cvs->Designation}}</p>

                                <h4 class=""><b>Company Name:</b></h4>
                                <p>{{$cvs->Company}}</p>

                                <h4 class=""><b>Skills:</b></h4>
                                <p>{{$cvs->Skills}}</p>

                    


                    </div>
                
                   
            
            </div>
            <div class="nextpro mt-3">
                <a href="{{route('generate-pdf',$cvs->id)}}" class="btn btn-info ml-3 float-right">Downlaod</a>
                <a href="{{ route('cv.edit')}}" class="btn btn-primary float-right">Edit </a>

            </div>
        </div>
    </div>
</div>



@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
    
</script>
@endsection
@endsection
