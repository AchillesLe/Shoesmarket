<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idproduct
 * @property string $color
 * @property string $size
 * @property int $quantity
 * @property Product $product
 */
class Productcolor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'productcolors';

    public $timestamps = false;

    /**
     * @var array
     */
    public $timestamps = false;
    protected $fillable = ['idproduct', 'color', 'size', 'quantity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'idproduct');
    }

    public function detailBills()
    {
        return $this->hasMany('App\Product', 'idproductcolor');
    }
}
