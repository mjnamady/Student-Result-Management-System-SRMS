<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\User;
use App\Models\Result;
use Illuminate\Support\Facades\Redis;

class ResultController extends Controller
{
    public function AddResult(){
        $classes = Classes::all();
        return view('backend.result.add_result', compact('classes'));
    } // End method

    public function FetchStudent(Request $request){
       $class_id = $request->input('class_id');
       $students = User::where('class_id', $class_id)->get();
       $std_data = '<option value="">--Select a Student--</option>';
       foreach($students as $student){
            $std_data .= '<option value="'.$student->id.'">'.$student->name.' | '.$student->roll_id.'</option>';
       }

       $class = Classes::with('subjects')->where('id', $class_id)->first();
       $class_Subjects = $class->subjects;

       for ($i=0; $i < count($class_Subjects) ; $i++) { 
            $subject_data[$i] = '<label for="" style="padding-top:10px;">'.$class_Subjects[$i]->subject_name.'</label>
                <input class="form-control" name="subject_ids[]" type="hidden" value="'.$class_Subjects[$i]->id.'" >
                <input class="form-control" name="marks[]" type="text" required placeholder="Enter marks out of 100" >';
       }

       return response()->json(['students'=>$std_data, 'subjects'=>$subject_data]);
    }  // End method

    public function CheckStudentResult(Request $request){
        $student_id = $request->get('id');
        $result = Result::where('student_id', $student_id)->first();
        $message = '';
        if ($result) {
           $message .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    This Student\'s Result Is Already Declared!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        return response()->json($message);
    } // End method

    public function StoreResult(Request $request){
        $sub_count = $request->input('subject_ids');
        for ($i=0; $i < count($sub_count); $i++) { 
            $result = [
                'student_id' => $request->student_id,
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_ids[$i],
                'marks' => $request->marks[$i],
            ];
            Result::create($result);
        }
        
        $nofication = array(
            'message' => 'Result Declared!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($nofication);
    } // End method

    public function ManageResult(){
        $results = Result::groupBy('student_id')->get();
        return view('backend.result.manage_result', compact('results'));
    } // End method

    public function EditResult($id){
        $result = Result::where('student_id',$id)->get();
        return view('backend.result.edit_result', compact('result'));
    } // End method

    public function UpdateResult(Request $request){
        $sub_count = $request->input('subject_ids');
        for ($i=0; $i < count($sub_count); $i++) { 
            Result::where('id', $request->result_ids[$i])->update([
                'subject_id' => $request->subject_ids[$i],
                'marks' => $request->marks[$i],
            ]);
        }
        
        $nofication = array(
            'message' => 'Result Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($nofication);
    } // End method

    public function DeleteResult($id){
        $result = Result::where('student_id', $id)->get();
        for ($i=0; $i < count($result); $i++) { 
                $result[$i]->delete();
        }

        $nofication = array(
            'message' => 'Result Delete Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($nofication);
    } // End method

    public function ViewResult($id){
        $result = Result::where('student_id', $id)->get();
        return view('backend.result.result_admin_view', compact('result'));
    } // End method


}
