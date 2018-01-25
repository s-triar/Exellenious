<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';
    
    public function privateteachers()
    {
        return $this->belongsTo('App\Privateteacher', 'id_privateteacher');
    }
    public function subjects()
    {
        return $this->belongsTo('App\Subject', 'id_subject');
    }
    public function materials()
    {
        return $this->hasMany('App\Material', 'id_classroom');
    }
    public function member_classrooms()
    {
        return $this->hasMany('App\Member_classroom', 'id_classroom');
    }
}
