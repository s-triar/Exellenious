<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';
    
    public function classrooms()
    {
        return $this->belongsTo('App\Classroom', 'id_classroom');
    }
}
