<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;

class ResultController extends Controller
{
    public function AddResult(){
        $classes = Classes::all();
        return view('backend.result.add_result', compact('classes'));
    } // End method
}
