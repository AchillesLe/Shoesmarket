<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplierspackage extends Model
{
    protected $table = "package";

    public function package()
    {
    	return $this->belongsTo('App\package','idpackage','idpackage');
    }
    public function seller()
    {
    	return $this->belongsTo('App\seller','idseller','idseller');
    }
}
