@extends('admin.dashboard')
@section('admin')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Student Admission </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Student</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard">Create</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

<div class="card">
    <div class="card-body">

        <h4 class="card-title">Fill The Student Info</h4>
        <form action="{{ route('store.student') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Full Name:</label>
            <div class="col-sm-10">
                <input class="form-control" name="full_name" type="text" required placeholder="Full Name" >
            </div>
        </div>
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Roll Id:</label>
            <div class="col-sm-10">
                <input class="form-control" name="roll_id" type="text" required placeholder="Roll Id" >
            </div>
        </div>
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input class="form-control" name="email" type="email" required placeholder="Email" >
            </div>
        </div>
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Class:</label>
            <div class="col-sm-10">
                <select name="class_id" class="form-select" aria-label="Default select example">
                    <option selected="">-- Select a Class --</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }} ({{ $class->section }})</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Gender:</label>
            <div class="col-sm-10">
                    <input class="form-check-input" type="radio" name="gender" value="Male" checked="">
                    <label class="form-check-label" for="formRadios1"> Male</label>

                    <input class="form-check-input" type="radio" name="gender" value="Female">
                    <label class="form-check-label" for="formRadios1"> Female</label>
            </div>
        </div>
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">DOB:</label>
            <div class="col-sm-10">
                <input class="form-control" type="date" name="dob" placeholder="mm/dd/yy" id="example-date-input">
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Photo:</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" name="photo" id="image">
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage" src="{{ asset('uploads/no_image.jpg') }}" alt="avatar-5" class="rounded avatar-lg">
                
            </div>
        </div>
         
        <div class="row mb-3">
            {{-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> --}}
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Add Student</button>
            </div>
        </div>
       
    </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
    
    });
    </script>

@endsection