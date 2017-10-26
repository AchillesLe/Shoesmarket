<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    protected $table = "package";

    public function sellerspackage()
    {
    	return $this->hasMany('App\sellerspackage','idpackage','idpackage');
    }
}
