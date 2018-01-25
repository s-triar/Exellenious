<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_fee extends Model
{
    protected $table = 'transaction_fees';
    public function privateteachers()
    {
        return $this->belongsTo('App\Privateteacher', 'id_privateteacher');
    }
    public function learnings()
    {
        return $this->belongsTo('App\Learning', 'id_learning');
    }
    public function admins()
    {
        return $this->belongsTo('App\Admin', 'id_admin');
    }

}
