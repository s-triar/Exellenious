<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registered_as extends Model
{
    protected $table = 'registered_as';
    
    public function auths()
    {
        return $this->hasMany('App\Auth', 'id_registered_as');
    }
    
}
