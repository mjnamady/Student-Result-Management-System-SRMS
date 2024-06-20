<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function CreateSubject(){
        return view('backend.subject.create_subject');
    } // End method

    public function StoreSubject(Request $request){
        $subject = new Subject();
        $subject->subject_name = $request->subject_name;
        $subject->subject_code = $request->subject_code;
        $subject->save();

        $notification = array(
            'message' => 'Subject Created Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.subjects')->with($notification);
    } // End method

    public function ManageSubject(){
         $subjects = Subject::all();
         return view('backend.subject.manage_subjects', compact('subjects'));
    } // End method

    public function EditSubject($id){
        $subject = Subject::findOrFail($id);
        return view('backend.subject.edit_subject', compact('subject'));
    } // End method

    public function UpdateSubject(Request $request){
        Subject::find($request->id)->update([
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code
        ]);

        $notification = array(
            'message' => 'Subject Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.subjects')->with($notification);
    } // End method

    public function DeleteSubject($id){
        Subject::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Subject Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.subjects')->with($notification);
    } // End method


}