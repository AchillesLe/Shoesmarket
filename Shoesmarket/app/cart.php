<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = "cart";

    public function detail_cart()
    {
    	return $this->hasMany('App\detail_cart','idcart','idcart');
    }
	public function users()
    {
    	return $this->belongsTo('App\users','iduser','iduser');
    }

}
