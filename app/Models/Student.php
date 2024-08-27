<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Student extends Model
{
    use HasFactory;


    public $fillable =[
        'student_name',
        'father_phone_number'
    ];


    // Many to many relation with other tables 

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teachers_students');
    }
    public function centers()
    {
        return $this->belongsToMany(Center::class,'students_centers');
    }

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class,'students_assignments');
    }

}
