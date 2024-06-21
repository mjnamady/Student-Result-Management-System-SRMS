<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function CreateClass(){
        return view('backend.class.create_class');
    } // End method

    public function StoreClass(Request $request){

        $class = new Classes();
        $class->class_name = $request->class_name;
        $class->section = $request->section;
        $class->save();

        $notification = array(
            'message' => 'Class Created Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.classes')->with($notification);
    } // End method

    public function ManageClasses(){
        $classes = Classes::all();
        return view('backend.class.manage_class', compact('classes'));
    } // End method

    public function EditClass($id){
        $class = Classes::find($id);
        return view('backend.class.edit_class', compact('class'));
    } // End method

    public function UpdateClass(Request $request){
        $id = $request->id;
        Classes::find($id)->update([
            'class_name' => $request->class_name,
            'section' => $request->section,
        ]);

        $notification = array(
            'message' => 'Class info Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.classes')->with($notification);
    } // End method

    public function DeleteClass($id){
        
        Classes::find($id)->delete();

        $notification = array(
            'message' => 'Class Deleted Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // End method
}
