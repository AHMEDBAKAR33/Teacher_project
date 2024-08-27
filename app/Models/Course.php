<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    public $fillable =[
        'course_name'
    ];



    // One To many with teachers Relation 
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    // One to one relation with Assignment 
    public function assignments()
    {
        return $this->hasOne(Assignment::class);
    }
    


    // Many to many Relations 
    public function students()
    {
        return $this->belongsToMany(Student::class,'students_courses');
    }

    public function centers()
    {
        return $this->belongsToMany(Center::class,'courses_centers');
    }
}
