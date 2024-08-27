<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;



    public $fillable =[
        'teacher_name'
    ];

    // many to many relation between teachers table and other tables 
    public function students(){
        return $this->belongsToMany(Student::class,'teachers_students');
    }
    public function centers(){
        return $this->belongsToMany(Center::class,'teachers_centers');
    }

    // one to many relation with the course table 
    public function courses() {
        return $this->belongsTo(Course::class);
    }




}
