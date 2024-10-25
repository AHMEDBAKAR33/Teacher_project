<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Student;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Making Form to add  Modify Delete Centers
        $centers = Center::all();

        return view('crud_form.centers_form', compact('centers'));
    }


    public function create(Request $request)
    {

        $request->validate([
            'center_name'=>'required|max:50',
            'group_number'=>'required|integer|min:1|max:3',
        ],
        [
            'group_number.digits_between'=>'max number is 5'
        ]);
    
        $groupNumber = $request->group_number;
        for($i=1 ;$i<=$groupNumber;$i++){

            $new_center=Center::create([
                'center_name'=>$request->center_name,
                'group_number'=>$i
            ]);
        }
        return redirect()->back()->with('successMessage', 'تم اضافة السنتر ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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



    public function student_show(Center $center)
    {



        $student_id = DB::table('students_centers')->where('center_id', $center->id)->pluck('student_id');
        $students[$center->id] = Student::whereIn('id', $student_id)->get();

        


            return view('crud_form.student_center_show', compact('students', 'center'));
    }





    // public function elrai(Center $center){
    //     // dd($center);
    //     $center = Center::where('center_name',$center->center_name)->get();
    //         return view('centers.elrai',compact('center'));

    // }
    
    // public function elsahaba(Center $center){
        
    //     dd($center);
    // }
    // public function elamar(Center $center){
        
    //     dd($center);
    // }

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
