<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    
    public function auths()
    {
        return $this->hasOne('App\Auth','id', 'auth_id');
    }
    public function feedback_students()
    {
        return $this->hasMany('App\Feedback_student', 'id_student');
    }
    public function learnings()
    {
        return $this->hasMany('App\Learning', 'id_student');
    }
    public function member_classrooms()
    {
        return $this->hasMany('App\Member_classroom', 'id_student');
    }
    public function report_students()
    {
        return $this->hasMany('App\Report_student', 'id_student');
    }
    public function school_history_students()
    {
        return $this->hasMany('App\School_history_student', 'id_student');
    }
}
