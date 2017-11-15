<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
   protected $table = "product";

    // public function detail_bill()
    // {
    // 	return $this->hasMany('App\detail_bill','idproduct','id');
    // }
    // public function producttype()
    // {
    //     return $this->belongsTo('App\producttype','idprotype','id');
    // }
    // public function producttype()
    // {
    //     return $this->belongsTo('App\producttype','idprotype','id');
    // }

	// public function seller()
 //    {
 //        return $this->belongsTo('App\seller','idseller','id');
 //    }
}
