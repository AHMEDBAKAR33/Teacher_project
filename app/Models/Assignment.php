<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;


    protected $fillable =[
        'assignment_name',
        'student_id',
        'is_completed',
        'assignment_time'
    ];

    // public $timestamps=false;


    // Many to Many Relation with student 

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    


    
}
