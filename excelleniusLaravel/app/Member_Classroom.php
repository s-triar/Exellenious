<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member_Classroom extends Model
{
    protected $table = 'member_classrooms';
    
    public function classrooms()
    {
        return $this->belongsTo('App\Classroom', 'id_classroom');
    }

    public function homeworks()
    {
        return $this->hasMany('App\Homework', 'id_classroom');
    }

    public function students(){
        return $this->belongsTo('App\Student', 'id_student');
    }
}
