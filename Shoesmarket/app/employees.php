<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class employees extends Authenticatable
{
	use Notifiable;

    protected $guard ='admin';

    public function role()
    {
    	return $this->belongsTo('App\role','idrole','idrole');
    }
	 
}
