@extends('admin.dashboard')
@section('admin')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Student Class</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard">Class</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

<div class="card">
    <div class="card-body">

        <h4 class="card-title">Edit Student Class</h4>
        <form action="{{ route('update.class') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $class->id }}" >
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Class Name:</label>
            <div class="col-sm-10">
                <input class="form-control" name="class_name" type="text" value="{{ $class->class_name }}" >
                <p style="font-style: italic">Eg - Second, Third, Fouth, Sixth etc</p>
            </div>
        </div>
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Section:</label>
            <div class="col-sm-10">
                <input class="form-control" name="section" type="text" value="{{ $class->section }}" >
                <p style="font-style: italic">Eg - A, B, C etc</p>
            </div>
        </div>
         
        <div class="row mb-3">
            {{-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> --}}
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Class</button>
            </div>
        </div>
       
    </form>
    </div>
</div>

@endsection