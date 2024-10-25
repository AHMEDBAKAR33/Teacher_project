<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Student;
use App\Models\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    //
    public function index($center_id){
        $center = Center::with('students')
        ->where('id',$center_id)
        ->first();

        $students = $center->students;

        // dd($students);
        foreach ($students as $student){
            
            $attendances = Attendence::where('student_id',$student->id)->get();
        }
        return view('centers.attendance',compact('students','attendances'));
    }

    public function create(Request $request){
        $studentIDs= array_keys($request->is_completed);

        foreach($studentIDs as $studentID){
            $student = Student::findOrFail($studentID);


                Attendence::updateOrCreate([
                    'student_id'=>$studentID,
                    'attended'=>$request->is_completed[$studentID],
                    'attendance_time'=> now(),
                ]);


            
        }
    }
}
