<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privateteacher extends Model
{
    protected $table = 'privateteachers';
    
    public function auths()
    {
        return $this->hasOne('App\Auth','id', 'auth_id');
    }
    public function work_status()
    {
        return $this->belongsTo('App\Work_status', 'id_work_status');
    }
    public function classrooms()
    {
        return $this->hasMany('App\Classroom', 'id_privateteacher');
    }
    public function expert_subjects()
    {
        return $this->hasMany('App\Expert_subject', 'id_privateteacher');
    }
    public function feedback_students()
    {
        return $this->hasMany('App\Feedback_student', 'id_privateteacher');
    }
    public function feedback_parents()
    {
        return $this->hasMany('App\Feedback_parent', 'id_privateteacher');
    }
    public function learnings()
    {
        return $this->hasMany('App\Learning', 'id_privateteacher');
    }
    public function report_parents()
    {
        return $this->hasMany('App\Report_parent', 'id_privateteacher');
    }
    public function report_students()
    {
        return $this->hasMany('App\Report_student', 'id_privateteacher');
    }
    public function schedule_privateteachers()
    {
        return $this->hasMany('App\Schedule_privateteacher', 'id_privateteacher');
    }
    public function school_history_privateteachers()
    {
        return $this->hasMany('App\School_history_privateteacher', 'id_privateteacher');
    }
    public function transaction_fees()
    {
        return $this->hasMany('App\Transaction_fee', 'id_privateteacher');
    }
}
