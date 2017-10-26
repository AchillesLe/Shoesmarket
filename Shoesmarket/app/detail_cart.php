<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_cart extends Model
{
    protected $table = "detail_cart";

    public function cart()
    {
    	return $this->belongsTo('App\cart','idcart','idcart');
    }
	public function product()
	{
		return $this->hasOne('App\product','idproduct','idproduct');
	}
}
