<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback_student extends Model
{
    protected $table = 'feedback_parents';
    
    public function privateteachers()
    {
        return $this->belongsTo('App\Privateteacher', 'id_privateteacher');
    }
    public function students()
    {
        return $this->belongsTo('App\Student', 'id_student');
    }
}
