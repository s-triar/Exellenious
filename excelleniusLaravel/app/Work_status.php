<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_status extends Model
{
    protected $table = 'work_statuss';
    public function privateteachers()
    {
        return $this->hasMany('App\Privateteacher', 'id_work_status');
    }
}
