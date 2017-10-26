<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producttype extends Model
{
    protected $table = "producttype";

    public function product()
    {
    	return $this->hasMany('App\product','idproduct','id');
    }

    public function type()
    {
    	return $this->belongsTo('App\type','idtype','id');
    }
}
