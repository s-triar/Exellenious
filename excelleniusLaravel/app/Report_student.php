<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report_student extends Model
{
    protected $table = 'report_students';
    
    public function privateteachers()
    {
        return $this->belongsTo('App\Privateteachers', 'id_privateteacher');
    }
    public function students()
    {
        return $this->belongsTo('App\Student', 'id_student');
    }
}
