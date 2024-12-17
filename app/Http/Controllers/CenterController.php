<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Student;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CenterController extends Controller
{
    // Fetch all Centers 
    public function index()
    {
        // Making Form to add  Modify Delete Centers
        $centers = Center::all();

        return view('crud_form.centers_form', compact('centers'));
    }




    // Create new Center with Group number 

    public function create(Request $request)
    {

        $request->validate([
            'center_name'=>'required|max:50',
            'group_number'=>'required|integer|min:1|max:3',
            'group_time'=>'required',
            'group_day'=>'required',
        ],
        [
            'group_number.digits_between'=>'max number is 5'
        ]);


        Center::create($request->all());
        // Loop over The given Number To create Groups For each Center = to the given number 
        /* This my idea to fix the problem of fetching student relevant  to their Group number  */

        $groupNumber = $request->group_number;
        // for($i=1 ;$i<=$groupNumber;$i++){

        //     $new_center=Center::create([
        //         'center_name'=>$request->center_name,
        //         'group_number'=>$i
                
        //     ]);
        // }

        return redirect()->back()->with('successMessage', 'تم اضافة السنتر ');
    }




    public function edit(Center $center)
    {
        //

        return view('crud_form.center_edit', compact('center'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Center $center)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Center $center)
    {
        //
        $center->delete();

        // return redirect()->back()->with('deleteMessage')
        return redirect()->back()->with('deleteMessage', 'تم حذف السنتر');
    }



        // Fetch the Student Data according to their Group number //
    public function student_show(Center $center)
    {



        $student_id = DB::table('students_centers')->where('center_id', $center->id)->pluck('student_id');
        $students[$center->id] = Student::whereIn('id', $student_id)->get();

        


            return view('crud_form.student_center_show', compact('students', 'center'));
    }






    public function ShowGroup($center_id,$group_number){

        // fetch the center id and group number in addition to the related students 
        $center = Center::with('students')
        ->where('id',$center_id)
        ->where('group_number',$group_number)
        ->first();

    
        // fetch the related students in separate variable 
        $students = $center->students;



        $assignment = Assignment::with('students')->first();


        return view('centers.elrai_group1',compact('center','students','assignment'));
    }
}
