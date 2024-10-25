<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\MainpageController;
use App\Http\Controllers\StudentController;
use App\Models\Attendence;
use App\Models\Center;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::get('/', [MainpageController::class, '__invoke'])->name('main');


// Teacher Routes



// Center Routes
Route::get('/center', [CenterController::class, 'index'])->name('center.form');
Route::post('/center/create', [CenterController::class, 'create'])->name(('center.create'));
Route::delete('/center/{center}', [CenterController::class, 'destroy'])->name('center.delete');
Route::get('/center/{center}/edit', [CenterController::class, 'edit'])->name('center.edit');
Route::get('/center/{center}', [CenterController::class, 'student_show'])->name('student/center.show');

// making routes to create 3 groups buttons 
Route::get('/center/{center}',[CenterController::class,'student_show'])->name('center.show');
// Student Routes 
Route::get('student', [StudentController::class, 'index'])->name('student.form');
Route::post('student/create', [StudentController::class, 'create'])->name('student.create');
Route::patch('/student/assignment/{student_id}/{assignment_id}',[StudentController::class,'student_assignment'])->name('student.assignment');



// Making route for the student search bar 
Route::get('/student/search', [StudentController::class, 'searchStudent'])->name('student.search');



// Attendance Route 
Route::post('/student/attendance',[AttendenceController::class,'create'])->name('attendance.create');
Route::get('/student/attendance/center/{center_id}',[AttendenceController::class,'index'])->name('GroupAttendance.index');

// Elrai Routes
Route::get('/center/elrai/{center}}',[CenterController::class,'elrai'])->name('elrai.show');
Route::get('/center/elrai/{center_id}/group/{group_number}',[CenterController::class,'ShowGroup'])->name('group.show');



//aaaaaaaaaaaaaaaaaaaaaaa
Route::get('/center/elsahaba/{center}',[CenterController::class,'elsahaba'])->name('elsahaba.show');
Route::get('/center/elamar/{center}',[CenterController::class,'elamar'])->name('elamar.show');





