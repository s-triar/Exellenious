<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School_history_privateteacher extends Model
{
    protected $table = 'school_history_privateteachers';
    
    public function privateteachers()
    {
        return $this->belongsTo('App\Privateteacher', 'id_privateteacher');
    }
    public function schools()
    {
        return $this->belongsTo('App\School', 'id_school');
    }
}
