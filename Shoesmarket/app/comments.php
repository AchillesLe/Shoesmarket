<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = "comments";

    public function users()
    {
    	return $this->belongsTo('App\users','iduser','iduser');
    }
	public function seller()
	{
		return $this->belongsTo('App\seller','idseller','idseller');
	}
	
}
