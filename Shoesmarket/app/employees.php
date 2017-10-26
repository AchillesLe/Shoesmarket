<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $table = "detail_bill";

    public function role()
    {
    	return $this->belongsTo('App\role','idrole','idrole');
    }
	 
}
