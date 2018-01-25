<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback_parent extends Model
{
    protected $table = 'feedback_parents';
    
    public function privateteachers()
    {
        return $this->belongsTo('App\Privateteacher', 'id_privateteacher');
    }
    public function parents()
    {
        return $this->belongsTo('App\Parentstudent', 'id_parent');
    }
}
