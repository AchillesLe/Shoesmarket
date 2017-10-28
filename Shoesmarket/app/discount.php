<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    protected $table = "discount";
    public $timestamps = false;
    
    public function product()
    {
    	return $this->hasMany('App\product','iddiscount','id');
    }
}
