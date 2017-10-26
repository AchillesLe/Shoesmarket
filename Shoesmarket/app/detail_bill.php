<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_bill extends Model
{
    //
    protected $table = "detail_bill";

    public function bill()
    {
    	return $this->belongsTo('App\bill','idbill','idbill');
    }
	public function product()
	{
		return $this->hasOne('App\product','idproduct','idproduct');
	}
}
