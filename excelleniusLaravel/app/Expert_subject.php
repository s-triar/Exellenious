<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert_subject extends Model
{
    protected $table = 'expert_subjects';
    
    public function privateteachers()
    {
        return $this->belongsTo('App\Privateteacher', 'id_privateteacher');
    }
    public function subjects()
    {
        return $this->belongsTo('App\Subject', 'id_subject');
    }
}
