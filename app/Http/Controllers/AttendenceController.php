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

    /* 
        in here we created new property to the student model with the name {latestAttendance}
        which will save the last fetch attendance we fetch from the data base to be easier to show in view 

        so we can create new property to save the fetched record on it to simple the showing method 
     */
        foreach ($students as $student){
            $student->latestAttendance = $student->attendances()->get();
        }
        return view('centers.attendance',compact('students'));
    }

    public function create(Request $request){
        // dd($request);
        $studentIDs= array_keys($request->is_completed);

        foreach($studentIDs as $studentID){
            $student = Student::findOrFail($studentID);


                Attendence::updateOrCreate([
                    'student_id'=>$studentID,
                    'attended'=>$request->is_completed[$studentID],
                    'attendance_time'=> now(),
                ]);
        }

        return redirect()->back()->with('success_message','تم تسجيل الحضور');
    }
}
