<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';
    
    public function school_history_privateteachers()
    {
        return $this->hasMany('App\School_history_privateteacher', 'id_school');
    }
    public function school_history_students()
    {
        return $this->hasMany('App\School_history_student', 'id_school');
    }

}
