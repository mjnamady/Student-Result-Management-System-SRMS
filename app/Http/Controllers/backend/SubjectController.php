<?php

namespace App\Http\Controllers\backend;

use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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


    // SUBJECT COMBINATION ALL METHODS
    public function AddSubjectCombination(){
        $classes = Classes::all();
        $subjects = Subject::all();
        return view('backend.subject.add_subject_combination', compact('classes', 'subjects'));
    } // End method

    public function StoreSubjectCombination(Request $request){
        // dd($request->all());
        $class = Classes::findOrFail($request->input('class'));
        $subjects = $request->input('subjects');
        $class->subjects()->attach($subjects);
        $notification = array(
            'message' => 'Combination Done Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method

    public function ManageSubjectCombination(){
        $result = DB::table('classes_subject')
                        ->join('classes', 'classes_subject.classes_id', 'classes.id')
                        ->join('subjects', 'classes_subject.subject_id', 'subjects.id')
                        ->select(
                            'classes_subject.*',
                            'classes.class_name',
                            'classes.section',
                            'subjects.subject_name'
                            )
                        ->get();
        return view('backend.subject.manage_subject_combination', compact('result'));
    } // End method

    public function DeactivateSubjectCombination($id){
        $status = DB::table('classes_subject')->select('status')->where('id', $id)->first();
        // dd($status->status);
        if($status->status == 1){
            $status = 0;
            DB::table('classes_subject')->where('id', $id)->update(['status'=>$status]);

            $notification = array(
                'message' => 'Subject De-activated Successfully!',
                'alert-type' => 'success'
            );
        } elseif($status->status == 0){
            $status = 1;
            DB::table('classes_subject')->where('id', $id)->update(['status'=>$status]);

            $notification = array(
                'message' => 'Subject Activated Successfully!',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($notification);
    } // End method


}