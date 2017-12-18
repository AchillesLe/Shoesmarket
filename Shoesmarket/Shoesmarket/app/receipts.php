<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class receipts extends Model
{
    public function employee()
    {
    	return $this->hasOne('App\employees','id','idemployee');
    }
    public function seller()
    {
    	return $this->hasOne('App\seller','id','idseller');
    }
}
