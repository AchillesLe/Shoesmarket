<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class employees extends Authenticatable
{
	use Notifiable;

    protected $table ='employees';
    protected $guard ='admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
    	return $this->belongsTo('App\role','idrole','id');
    }
    
    
}
