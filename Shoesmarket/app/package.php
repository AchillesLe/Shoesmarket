<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $newquantity
 * @property float $money
 */
class Package extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'packages';

    /**
     * @var array
     */
    protected $fillable = ['name', 'newquantity', 'money'];

}
