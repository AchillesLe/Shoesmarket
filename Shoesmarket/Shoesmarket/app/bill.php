<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $table = "bill";
    protected $timestamp =false;
    public function bill_seller()
    {
        return $this->hasMany('App\bill_seller','idbill','id');
    }
    public function users()
    {
    	return $this->belongsTo('App\user','iduser','id');
    }
    public function county()
    {
        return $this->belongsTo('App\county','countyname','id');
    }
}
