<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_question_test extends Model
{
    protected $table = 'bank_question_tests';
    
    public function admins()
    {
        return $this->belongsTo('App\Admin', 'id_admin');
    }
    public function bank_answer_keys()
    {
        return $this->hasOne('App\Bank_answer_key', 'id_bank_question_test');
    }
    
}
