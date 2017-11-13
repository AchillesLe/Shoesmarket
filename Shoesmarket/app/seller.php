<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    protected $table = "seller";

	public function product()
	{
		return $this->hasMany('App\product','idseller','idseller');
	}
	 public function rating()
    {
    	return $this->hasOne('App\rating','idseller','idseller');
    }
}
