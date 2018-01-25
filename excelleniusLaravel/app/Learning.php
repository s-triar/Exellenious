<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
    protected $table = 'learnings';
    
    public function privateteachers()
    {
        return $this->belongsTo('App\Privateteacher', 'id_privateteacher');
    }
    public function students()
    {
        return $this->belongsTo('App\Student', 'id_student');
    }
    public function subjects()
    {
        return $this->belongsTo('App\Subject', 'id_subject');
    }
    public function schedule_privateteachers()
    {
        return $this->belongsTo('App\Schedule_privateteacher', 'id_schedule_privateteacher');
    }
    public function transaction_fees()
    {
        return $this->hasMany('App\Transaction_fee', 'id_learning');
    }
}
