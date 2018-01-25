<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentstudent extends Model
{
    protected $table = 'parents';
    
    public function auths()
    {
        return $this->hasOne('App\Auth','id', 'auth_id');
    }
    public function feedback_parents()
    {
        return $this->hasMany('App\Feedback_parent', 'id_parent');
    }
    public function report_parents()
    {
        return $this->hasMany('App\Report_parent', 'id_privateteacher');
    }
}
