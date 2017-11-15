<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = "news";
	public function product()
    {
    	return $this->hasOne('App\product','id','idproduct');
    }
    
}
