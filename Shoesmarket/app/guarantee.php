<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guarantee extends Model
{
    protected $table = "guarantee";
    public $timestamps = false;
    public function product()
    {
    	return $this->hasMany('App\product','idguarantee','id');
    }
}
