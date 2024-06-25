<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Result;

class StudentResultController extends Controller
{
    
    public function index(){
        $classes = Classes::all();
        return view('frontend.index', compact('classes'));
    } // End method

    public function SearchResult(Request $request){
        $roll_id = $request->input('roll_id');
        $class_id = $request->input('class_id');
        $student = User::where('roll_id', $roll_id)->where('class_id', $class_id)->first();

        if(!$student){
            $notification = array(
                'message' => 'Invalid Studnet Credentials!',
                'alert-type' => 'error',
            );
            return back()->with($notification);
        } 

        $result = Result::where('student_id', $student->id)->get();

        if(count($result) === 0){
            $notification = array(
                'message' => 'Sorry Result Not Declared Yet!',
                'alert-type' => 'info',
            );
            return back()->with($notification);
        }
        return view('frontend.student_result', compact('result'));
       
    } // End method

}
