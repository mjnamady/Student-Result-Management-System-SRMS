<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function AddStudent(){
        $classes = Classes::all();
        return view('backend.student.add_student', compact('classes'));
    } // End method

    public function StoreStudent(Request $request){
        $student = new User();
        $student->name = $request->full_name;
        $student->email  = $request->email;
        $student->roll_id = $request->roll_id;
        $student->class_id = $request->class_id;
        $student->DOB = $request->dob;
        $student->gender = $request->gender;
        $student->password = Hash::make('1234');
        
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            // @unlink(public_path('uploads/student_profile/'.$student->photo));
            $photoName = 'student-'. date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/student_profile'),$photoName);
            $student['photo'] = $photoName;
        }

        $student->save();

        $notification = array(
            'message' => 'Student Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End method

    public function ManageStudent(){
        $students = User::where('role', 'student')->get();
        return view('backend.student.manage_student', compact('students'));
    }  // End method

    public function EditStudent($id){
        $student = User::findOrFail($id);
        $classes = Classes::all();
        return view('backend.student.edit_student', compact('student','classes'));
    } // End method

    public function UpdateStudent(Request $request){
        $std_id = $request->id;
        $student = User::findOrFail($std_id);
        $student->name = $request->full_name;
        $student->email  = $request->email;
        $student->roll_id = $request->roll_id;
        $student->class_id = $request->class_id;
        $student->DOB = $request->dob;
        $student->gender = $request->gender;
        $student->status = $request->status;
        
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            @unlink(public_path('uploads/student_profile/'.$student->photo));
            $photoName = 'student-'. date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/student_profile'),$photoName);
            $student['photo'] = $photoName;
        }

        $student->save();

        $notification = array(
            'message' => 'Student Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.student')->with($notification);
    } // End method

    public function DeleteStudent($id){
        $student = User::findOrFail($id);
        @unlink(public_path('uploads/student_profile/'.$student->photo));
        $student->delete();

        $notification = array(
            'message' => 'Student Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method



}
