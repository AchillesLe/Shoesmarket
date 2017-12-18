<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = "role";

    public function employee()
    {
    	return $this->hasMany('App\employee','idrole','idrole');
    }
}
