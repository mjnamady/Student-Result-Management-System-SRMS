@extends('admin.dashboard')
@section('admin')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Update A Result </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Update</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard">Result</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

<div class="card">
    <div class="card-body">

        <h4 class="card-title">Update Student Result</h4>
        <form action="{{ route('update.result') }}" method="POST">
            @csrf

        <div class="row mb-3">
            <label style="text-align: right" for="example-email-input" class="col-sm-2 col-form-label" style="font-weight: bold">Student Name:</label>
            <div class="col-sm-10">
               <h6 style="font-style:italic;padding-top:10px;"> {{ $result[0]->student->name }} </h6>
            </div>
        </div>

        <div class="row mb-3">
           <label style="text-align: right" for="example-email-input" class="col-sm-2 col-form-label">Class:</label>
            <div class="col-sm-10">
                <h6 style="font-style:italic;padding-top:10px;"> {{ $result[0]->student->class->class_name }} Section - {{ $result[0]->student->class->section }} </h6>
            </div>
        </div>

        @php
            $count = count($result);
        @endphp
    
        <div class="row mb-3 sub">
            <label style="text-align: right" for="example-text-input" class="col-sm-2 col-form-label">Subjects:</label>
            <div class="col-sm-10" id="showSubjects">
                @for ($i = 0; $i < $count; $i++)
                    <label for="" style="padding-top:10px;">{{ $result[$i]->subject->subject_name }}</label>
                    <input class="form-control" name="result_ids[]" type="hidden" value="{{ $result[$i]->id }}" >
                    <input class="form-control" name="subject_ids[]" type="hidden" value="{{ $result[$i]->subject->id }}" >
                    <input class="form-control" name="marks[]" type="text" required placeholder="Enter marks out of 100" value="{{$result[$i]->marks}}">
                @endfor
                
            </div>
        </div>
       
     
         
        <div class="row mb-3">
            {{-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> --}}
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Result</button>
            </div>
        </div>
       
    </form>
    </div>
</div>

@endsection