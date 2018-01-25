<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule_privateteacher extends Model
{
    protected $table = 'schedule_privateteachers';
    
    public function privateteachers()
    {
        return $this->belongsTo('App\Privateteacher', 'id_privateteacher');
    }
    public function schedule_days()
    {
        return $this->belongsTo('App\Schedule_day', 'id_schedule_day');
    }
}
