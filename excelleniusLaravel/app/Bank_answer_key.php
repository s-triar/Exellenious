<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_answer_key extends Model
{
    protected $table = 'bank_answer_keys';
    
    public function admins()
    {
        return $this->belongsTo('App\Admin', 'id_admin');
    }
    public function bank_question_tests()
    {
        return $this->hasOne('App\Bank_question_test','id', 'id_bank_question_test');
    }
}
