<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;


    public $fillable =[
        'center_name',
        'group_number',
        'group_time',
        'group_day'
    ];

    public $timestamps = false;
    // Many to many Relations 


        public function students(){
            return $this->belongsToMany(Student::class,'centers_students');
        }

        
        
        
}
