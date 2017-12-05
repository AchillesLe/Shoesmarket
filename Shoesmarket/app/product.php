<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
   protected $table = "product";
    public function detail_bill()
    {
    	return $this->hasMany('App\detail_bill','idproduct','idproduct');
    }
	public function detail_cart()
    {
    	return $this->hasMany('App\detail_cart','idproduct','idproduct');
    }
	public function supplier()
	{
		return $this->belongsTo('App\supllier','idsupplier','idsupplier');
	}
	public function discount()
    {
    	return $this->belongsTo('App\discount','iddiscount','id');
    }
    public function guarantee()
    {
    	return $this->belongsTo('App\guarantee','idguarantee','id');
    }
    public function producttype()
    {
        return $this->belongsTo('App\producttype','idprotype','id');
    }

}
