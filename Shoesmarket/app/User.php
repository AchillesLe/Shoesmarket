<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;

class user extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = "user";
    
    public function bill()
    {
        return $this->hasMany('App\bill','iduser','iduser');
    }
    public function cart()
    {
        return $this->hasMany('App\cart','iduser','iduser');
    }
    public function comment()
    {
        return $this->hasMany('App\product','iduser','iduser');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
