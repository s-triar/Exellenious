<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule_day extends Model
{
    protected $table = 'schedule_days';
    
    public function admins()
    {
        return $this->belongsTo('App\Admin', 'id_admin');
    }
    public function schedule_privateteachers()
    {
        return $this->hasMany('App\Schedule_privateteacher', 'id_schedule_day');
    }
}
