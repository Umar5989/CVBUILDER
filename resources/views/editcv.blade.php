@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CV Builder') }}</div>
                <div class="pt-2">
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist" style="width: 100%;">
                        <li class="nav-item phrase-tabs">
                            <a class="nav-link phrase-tabs-inner active phrase_txt"  data-toggle="tab" href="#Personal" id="phrase-tabs-1"
                                data-value="Standard">
                                <span class="d-sm-block text-primary" style=" "><h5>Personal Info</h5></span>
                            </a>
                        </li>
                        <li class="nav-item phrase-tabs"  style="white-space: nowrap;">
                            <a class="nav-link phrase-tabs-inner" href="#Projects" id="phrase-tabs-2"  data-toggle="tab" data-value="Fluency">
                                <span class="d-sm-block text-primary" style=""><h5>Projects</h5></span>
                            </a>
                        </li>
                        <li class="nav-item phrase-tabs">
                            <a class="nav-link phrase-tabs-inner" href="#Education" id="phrase-tabs-3"  data-toggle="tab" data-value="Creative">
                                <span class="d-sm-block text-primary" style=" "><h5>Education</h5></span>
                            </a>
                        </li>
                        <li class="nav-item phrase-tabs">
                            <a class="nav-link phrase-tabs-inner" href="#Experience" data-value="Formal"  data-toggle="tab" id="phrase-tabs-4">
                                <span class="d-sm-block text-primary" style=" "><h5>Experience</h5></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-5">
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Personal" role="tabpanel" aria-labelledby="home-tab">
                        <h4>Personal Information </h4>
                        <form method="post" action="{{route('update.cv',$editcvs->id)}}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <b>Name:</b>
                                <input class="form-control mt-1" type="text" placeholder="Name" name="name" autocomplete="name"  value=" {{ $editcvs->name }}">
                                @error('name')
                                <span style="color:red; margin-left:8px;">Please add some Name</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-4">
                                <b>Phone Number:</b>
                                <input class="form-control mt-1" type="number" min="0"  placeholder="Number" name="number" autocomplete="number"  value="{{ $editcvs->number }}">
                                @error('number')
                                <span style="color:red; margin-left:8px;">Please add some number</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-4">
                                <b>Date Of Birth:</b>
                                <input class="form-control mt-1" type="date"  name="date" autocomplete="date"  value=" {{ $editcvs->date }}">
                                @error('date')
                                <span style="color:red; margin-left:8px;">Please add some date</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-4">
                                <b>Email:</b>
                                <input class="form-control mt-1" type="text" placeholder="example@mail.com" name="email" autocomplete="email"  value=" {{ $editcvs->email }}">
                                @error('email')
                                <span style="color:red; margin-left:8px;">Please add some email</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-4">
                                <b>Nationality:</b>
                                <input class="form-control mt-1" type="text" placeholder="Pakistan" name="nation" autocomplete="nation"  value=" {{ $editcvs->nation }}">
                                @error('nation')
                                <span style="color:red; margin-left:8px;">Please add some nation</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-4">
                                <b>Gender:</b>
                                <select class="form-select form-control mt-1" name="gender" autocomplete="gender"  value=" {{ $editcvs->gender }}">
                                    
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('gender')
                                <span style="color:red; margin-left:8px;">Please select some gender</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-4">
                                <b>Address:</b>
                                <input class="form-control mt-1" type="text" placeholder="Complete Address" name="address" autocomplete="address"  value=" {{$editcvs->address }}">
                                @error('address')
                                <span style="color:red; margin-left:8px;">Please add some address</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-4">
                                <b>About me:</b>
                                <div class="form-floating mt-1">
                                    <textarea class="form-control" placeholder="Write About Youre Self..." name="about" autocomplete="about"  value=" {{ old('about') }}">{{$editcvs->about}}</textarea> 
                                </div>
                                
                                @error('about')
                                <span style="color:red; margin-left:8px;">Please add some about</span>
                                @enderror
                              
                            </div>
                            <div class="col-md-6">
                                <b>Select Image:</b>
                                <div class="form-control">
                                    <input type="file" name="file" id="profile-img">
                                    
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <img src="{{asset('uploads/images/'.$editcvs->file)}}" id="profile-img-tag" width="200px" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="Projects" role="tabpanel" aria-labelledby="profile-tab">
                        <h4>Write Your Projects</h4>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="projects" name="projects" class="form-control tinymce-editor" autocomplete="projects"  >{{ $editcvs->projects }}</textarea>
                                </div>  
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Education" role="tabpanel" aria-labelledby="contact-tab">
                            <h4>College Information</h4>
                            <div class="row">
                            
                                    <div class="col-md-6 mt-4">
                                        <b>College Name:</b>
                                        <input class="form-control mt-1" type="text" placeholder="college-Name" name="collegeName" autocomplete="collegename"  value=" {{ $editcvs->collegeName }}">
                                        @error('collegeName')
                                        <span style="color:red; margin-left:8px;">Please add some College Name</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <b>intermediate degree :</b>
                                        <input class="form-control mt-1" type="text" placeholder="I.C.S" name="intermediate" autocomplete="intermediate"  value=" {{ $editcvs->intermediate}}">
                                        @error('intermediate')
                                        <span style="color:red; margin-left:8px;">Please add some intermediate degree</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <b>Start Date:</b>
                                        <input class="form-control mt-1" type="date" placeholder="1/12/2000" name="intermediatestart" autocomplete="intermediatestart"  value=" {{$editcvs->intermediatestart }}">
                                        @error('date')
                                        <span style="color:red; margin-left:8px;">Please add some date</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <b>End Date:</b>
                                        <input class="form-control mt-1" type="date" placeholder="1/12/2002" name="intermediateend"  value=" {{ $editcvs->intermediateend }}">
                                        @error('date')
                                        <span style="color:red; margin-left:8px;">Please add some date</span>
                                        @enderror
                                    </div>
                            </div>
                              <h4 class="mt-5">Universty Information</h4>
                                <div class="row">
                                        <div class="col-md-6 mt-4">
                                            <b>Universty Name:</b>
                                            <input class="form-control mt-1" type="text" placeholder="Universty-Name" name="Universtyname" value=" {{ $editcvs->Universtyname }}">
                                            @error('Universtyname')
                                            <span style="color:red; margin-left:8px;">Please add some Universty Name</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <b>Bachelor's degree :</b>
                                            <input class="form-control mt-1" type="text" placeholder="UET" name="Bachelor" value=" {{ $editcvs->Bachelor }}">
                                            @error('Bachelor')
                                            <span style="color:red; margin-left:8px;">Please add some Bachelor degree</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <b>Start Date:</b>
                                            <input class="form-control mt-1" type="date" placeholder="1/12/2000" name="Universtystart" value=" {{ $editcvs->Universtystart }}">
                                            @error('date')
                                            <span style="color:red; margin-left:8px;">Please add some date</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <b>End Date:</b>
                                            <input class="form-control mt-1" type="date" placeholder="1/12/2002" name="Universtyend" value=" {{ $editcvs->Universtyend }}">
                                            @error('date')
                                            <span style="color:red; margin-left:8px;">Please add some date</span>
                                            @enderror
                                        </div>
                                </div>
                    </div>
                    
                    
                    <div class="tab-pane fade" id="Experience" role="tabpanel" aria-labelledby="contact-tab">
                                 <h4>Experience</h4>
                                <div class="row">
                                      
                                        <div class="col-md-12 mt-4">
                                            <b>Company Name:</b>
                                            <input class="form-control mt-1" type="text" placeholder="Company" name="Company"  value=" {{ $editcvs->Company }}">
                                            @error('Company')
                                            <span style="color:red; margin-left:8px;">Please add  Company name</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <b>Designation With Details:</b>
                                            <div class="form-floating mt-1">
                                                <textarea class="form-control" placeholder="Write About Designation..." name="Designation" >{{ $editcvs->Designation }}</textarea> 
                                            </div>
                                            
                                            @error('Designation')
                                            <span style="color:red; margin-left:8px;">Please add some about</span>
                                            @enderror
                                          
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <b>Skills:</b>
                                            <div class="form-floating mt-1">
                                                <textarea class="form-control" placeholder="Write About Skills..." name="Skills" >{{ $editcvs->Skills }}</textarea> 
                                            </div>
                                            
                                            @error('Skills')
                                            <span style="color:red; margin-left:8px;">Please add some about</span>
                                            @enderror
                                          
                                        </div>
                                  
                                </div>
                            <button type="submit" class="btn mt-3 btn-primary float-right">Update Your CV</button>
                            </form>
                    </div>

                  </div>
                </div>

                  
             

            </div>
        </div>
    </div>
</div>



@section('scripts')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 400,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile-img").change(function(){
            readURL(this);
        });
    </script>

@endsection
@endsection
