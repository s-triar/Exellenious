<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $table = 'homeworks';
    
    public function member_classrooms()
    {
        return $this->belongsTo('App\Member_classroom', 'id_member_classroom');
    }
}
