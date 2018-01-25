<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School_history_student extends Model
{
    protected $table = 'school_history_student';
    
    public function students()
    {
        return $this->belongsTo('App\Student', 'id_student');
    }
    public function schools()
    {
        return $this->belongsTo('App\School', 'id_school');
    }
}
