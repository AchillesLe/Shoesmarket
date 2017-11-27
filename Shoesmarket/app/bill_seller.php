<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_seller extends Model
{
    protected $table = "bill_seller";
    protected $timestamp =false;
    
    // public function detail_bill()
    // {
    // 	return $this->hasMany('App\detail_bill','idbill','idbill');
    // }
    // public function users()
    // {
    // 	return $this->belongsTo('App\user','iduser','iduser');
    // }
    // public function employee()
    // {
    // 	return $this->belongsTo('App\users','iduser','iduser');
    // }
}
