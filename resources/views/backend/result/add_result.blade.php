@extends('admin.dashboard')
@section('admin')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Declare A Result </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Declare</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard">Result</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

<div class="card">
    <div class="card-body">

        <h4 class="card-title">Declare Student Result</h4>
        <form action="{{ route('store.result') }}" method="POST">
            @csrf
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Class:</label>
            <div class="col-sm-10">
                <select name="class_id" id="class_id" class="form-select dynamic" data-dependent="student">
                    <option selected="">-- Select a Class --</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Student Name:</label>
            <div class="col-sm-10">
                <select name="student_id" class="form-select" id="student" aria-label="Default select example">
                    <option selected="">--  --</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10" id="alert">
                
            </div>
        </div>
    
        <div class="row mb-3 sub">
            <label for="example-text-input" class="col-sm-2 col-form-label">subjects:</label>
            <div class="col-sm-10" id="showSubjects">
            </div>
        </div>
       
     
         
        <div class="row mb-3">
            {{-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> --}}
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Add Result</button>
            </div>
        </div>
       
    </form>
    </div>
</div>

<script>

    $(document).ready(function(){

        // Fetch Student Based on their Classes using jquery ajax request!
        $('.sub').hide();
        $('.dynamic').on('change', function(){
            let class_id = $(this).val();
            let dependent = $(this).data('dependent');
            let _token = "{{csrf_token()}}";
            $.ajax({
                url: "{{ route('fetch.student') }}",
                method: "GET",
                dataType: "json",
                data: {class_id:class_id, _token:_token},
                success: function(result){
                    $('#'+dependent).html(result.students);
                    $('#showSubjects').html(result.subjects);
                    $('.sub').show();
                }
            });
        });

        // Check wether a student result has been declared already using jquery ajax request!
        $('#student').change(function(){
            let student_id = $(this).val();
            $.ajax({
                url: "{{ route('check.student.result') }}",
                method: "GET",
                dataType: "json",
                data: {_token:"{{csrf_token()}}", id:student_id},
                success: function(data){
                    $('#alert').html(data);
                }
            });
        });


    });

</script>

@endsection