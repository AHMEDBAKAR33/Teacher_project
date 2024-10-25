<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Center;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Create Form To Add edit delete students
        $centers    =  Center::all();
        return view('crud_form.student_form', compact('centers'));
    }


    public function create(Request $request)
    {
        // making the saving logic 
        $request->validate([
            'student_name'=>'required|max:50',
            'father_phone'=>'required|digits_between:10,12',
            'center_id' =>'required'
        ]);

        $new_student = Student::create([
            'student_name' => $request->student_name,
            'father_PhoneNumber' => $request->father_phone,
        ]);

        $new_student->centers()->attach($request->center_id);


        return redirect()->back()->with('message', 'تم اضافة معلومات الطالب ');
    }


    // Custom methods 




    // search method for search for student 

    public function searchStudent(Request $request)
    {
    

    

        if (!empty($request->student_name)) {
            $students = Student::with('centers')->where('student_name', $request->student_name)->get();
        
            if ($students->isEmpty()) {
                // return redirect()->back()->with('failed', 'There is no student with this name');
                session()->flash('failed', 'There is no student with this name');
                return redirect()->back();
            }
        
            return redirect()->back()->with(['students' => $students]);
        }
    }
        
    



    public function student_assignment(Request $request,$student_id,$assignment_id){
        dd([$request,$student_id,$assignment_id]);
    }



}