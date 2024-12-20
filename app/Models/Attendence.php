<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;


    const CREATED_AT = 'attendance_time';
    const UPDATED_AT = 'edit_attendance';

    protected $fillable =[
        'student_id',
        'attended',
        'attendance_time',
        'test_degree',
        'student_degree'
    ];



}
