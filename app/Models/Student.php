<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Teacher;
use App\Models\Attendence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_name',
        'father_PhoneNumber',
        'student_PhoneNumber'
    ];


    // Many to many relation with other tables 

    public function centers(){
        return $this->belongsToMany(Center::class,'centers_students');
    }

    public function students(){
        return $this->hasMany(Assignment::class, 'student_id');
        }

    public function attendances(){
        return $this->hasMany(Attendence::class,'student_id');
    }

}

