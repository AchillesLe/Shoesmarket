<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    protected $table = "type";
    public $timestamps = false;
    public function producttype()
    {
    	return $this->hasMany('App\producttype','idtype','id');
    }
    public function product()
    {
    	return $this->hasManyThrough('App\product','App\producttype','idtype','idprotype','id');
    }
}
