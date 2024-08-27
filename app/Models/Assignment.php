<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;


    public $fillable =[
        'assignment_name'
    ];



    // One to One Relation with the Course 
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    // Many to Many Relation with student 

    public function students()
    {
        return $this->belongsToMany(Student::class,);
    }
    


    
}
