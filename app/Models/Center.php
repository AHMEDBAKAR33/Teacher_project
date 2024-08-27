<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;


    public $fillable =[
        'center_name'
    ];


    // Many to many Relations 

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teachers_centers');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class,'students_centers');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'courses_centers');
    }

}
