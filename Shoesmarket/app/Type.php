<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $isdelete
 * @property string $namemeta
 * @property string $description
 * @property Product[] $products
 */
class Type extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'types';

    /**
     * @var array
     */
    protected $fillable = ['name', 'isdelete', 'namemeta', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'idtype');
    }
}
