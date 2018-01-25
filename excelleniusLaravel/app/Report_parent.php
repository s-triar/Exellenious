<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report_parent extends Model
{
    protected $table = 'report_parents';
    
    public function privateteachers()
    {
        return $this->belongsTo('App\Privateteachers', 'id_privateteacher');
    }
    public function parents()
    {
        return $this->belongsTo('App\Parentstudent', 'id_parent');
    }
}
