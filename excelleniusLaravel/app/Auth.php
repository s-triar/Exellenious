<?php

namespace App;

use App\Notifications\AuthResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth extends Authenticatable
{
    use Notifiable;
    protected $table = 'auths';
    public function registered_as()
    {
        return $this->belongsTo('App\Registered_as', 'id_registered_as');
    }
    
    public function students()
    {
        return $this->hasOne('App\Student', 'auth_id');
    }
    
    public function privateteachers()
    {
        return $this->hasOne('App\Privateteacher', 'auth_id');
    }

    public function parents()
    {
        return $this->hasOne('App\Parentstudent', 'auth_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token_register','id_registered_as','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AuthResetPassword($token));
    }
}
