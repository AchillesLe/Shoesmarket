<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $table = "rating";

    public function seller()
    {
    	return $this->belongsTo('App\seller','idseller','idseller');
    }
}
