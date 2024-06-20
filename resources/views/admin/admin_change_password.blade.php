@extends('admin.dashboard')
@section('admin')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Admin's Password Update</h4>

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

        <h4 class="card-title">ADMIN'S PASSWORD - Update</h4>
        <form action="{{ route('admin.update.password') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
                <input class="form-control @error('old_password') is-invalid @enderror" name="old_password" type="text" placeholder="Old Password" >
                @error('old_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
       
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input class="form-control @error('new_password') is-invalid @enderror" name="new_password" type="text" placeholder="New Password" >
                @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input class="form-control" name="new_password_confirmation" type="text" placeholder="Confirm Password" >
            </div>
        </div>

        <div class="row mb-3">
            {{-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> --}}
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Change Password</button>
            </div>
        </div>
       
    </form>
    </div>
</div>

@endsection