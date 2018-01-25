<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    public function auth_admins()
    {
        return $this->hasOne('App\Auth_Admin','id', 'auth_id');
    }
    public function bank_answer_keys()
    {
        return $this->hasMany('App\Bank_answer_key', 'id_admin');
    }
    public function bank_question_tests()
    {
        return $this->hasMany('App\Bank_question_test', 'id_admin');
    }
    public function schedule_days()
    {
        return $this->hasMany('App\Schedule_day', 'id_admin');
    }
    public function schedule_hours()
    {
        return $this->hasMany('App\Schedule_hour', 'id_admin');
    }
    public function transaction_fees()
    {
        return $this->hasMany('App\Transaction_fee', 'id_admin');
    }
}
