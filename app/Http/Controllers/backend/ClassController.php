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
            'alert-type' => 'success'
        );

        return back()->with($notification);
    } // End method

    public function ManageClasses(){
        $classes = Classes::all();
        return view('backend.class.manage_class', compact('classes'));
    } // End method
}
