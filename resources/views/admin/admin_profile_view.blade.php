@extends('admin.dashboard')
@section('admin')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Admin's Profile</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

<div class="card">
    <div class="card-body">

        <h4 class="card-title">ADMIN PROFILE - Update</h4>
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input class="form-control" name="name" type="text" value="{{ $adminData->name }}" id="example-text-input">
            </div>
        </div>
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" name="email" type="email" value="{{ $adminData->email }}" id="example-email-input">
            </div>
        </div>
         <!-- end row -->
         <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
                <input type="file" name="photo" class="form-control" id="image">
            </div>
        </div>
        <!-- end row -->

        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <div>
                    <img id="showImage" src="{{ empty($adminData->photo)? asset('uploads/no_image.jpg') : asset('uploads/admin_profile/'.$adminData->photo) }}" alt="avatar-5" class="rounded avatar-lg">
                    
                </div>
            </div>
        </div>

        <div class="row mb-3">
            {{-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> --}}
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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