@extends('admin.dashboard')
@section('admin')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage Students</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manage</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard">Students</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">View Students Info</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Student Name</th>
                            <th>Roll Id</th>
                            <th>Class</th>
                            <th>Reg Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($students as $key => $student)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td><img src="{{ empty($student->photo)? asset('uploads/no_image.jpg') : asset('uploads/student_profile/'.$student->photo) }}" alt="Student" class="rounded-circle avatar-sm" style="width:30px;height:30px;padding:0"></td>
                                <td> {{ $student->name }} </td>
                                <td> {{ $student->roll_id }} </td>
                                <td> {{ optional($student->class)->class_name }} </td>
                                <td> {{ $student->created_at }} </td>
                                <td style="text-transform: capitalize"> {{ $student->status }} </td>
                                <td> 
                                    <a href="{{ route('edit.student',[$student->id]) }}" style="color:#444; margin-right:20px"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('delete.student',[$student->id]) }}" style="color:#444" id="delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection