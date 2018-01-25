<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    public function learnings()
    {
        return $this->hasMany('App\Learning', 'id_subject');
    }
    public function bank_question_tests()
    {
        return $this->hasMany('App\Bank_question_test', 'id_subject');
    }
    public function expert_subjects()
    {
        return $this->hasMany('App\Expert_subject', 'id_subject');
    }
    public function classrooms()
    {
        return $this->hasMany('App\Classroom', 'id_subject');
    }
}
