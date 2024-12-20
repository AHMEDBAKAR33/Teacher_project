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
    public function index($center_id,Request $request){
        // dd($request->name);
        // Fetch the center and related students 

        $attendance_time = $request->attendance_time;

        $count = Attendence::where('attendance_time',$attendance_time)->count();

        if($count>0){
        
        $center = Center::with('students')
        ->where('id',$center_id)
        ->first();
        
        $students = $center->students->sortBy('id');
    

    /* 
        in here we created new property to the student model with the name {latestAttendance}
        which will save the last fetch attendance we fetch from the data base to be easier to show in view 

        so we can create new property to save the fetched record on it to simple the showing method 
     */
        foreach ($students as $student){
            $student->LatestAttendance = DB::table('attendences')
            ->where('attendance_time', $attendance_time)
            ->select('id', 'student_id', 'attended','attendance_time') // Select only required columns
            ->first();             
            // $student->latestAttendance = $student->attendances()->orderBy('attendance_time','asc')->get();
        }
        return view('centers.attendance',compact('students'));
    }
    else{
        return redirect()->back()->with(['warning_message'=>'No attendance at this date ','date'=>$request->attendance_time]);
    }
        
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



    // implement New Search To find student with his attendance 
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
}
