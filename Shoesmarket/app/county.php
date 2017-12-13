<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Bill[] $bills
 * @property Shipfeeseller[] $shipfeesellers
 */
class County extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'countys';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bills()
    {
        return $this->hasMany('App\Bill', 'countyname');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipfeesellers()
    {
        return $this->hasMany('App\Shipfeeseller', 'idCounty');
    }
}
