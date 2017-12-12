<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idseller
 * @property int $idtype
 * @property string $name
 * @property int $quantity
 * @property float $price
 * @property int $size
 * @property string $sex
 * @property string $image
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property Type $type
 * @property Seller $seller
 * @property DetailBill[] $detailBills
 * @property News[] $news
 * @property Productcolor[] $productcolors
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = ['idseller', 'idtype', 'name', 'quantity', 'price', 'size', 'sex', 'image', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\Type', 'idtype');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo('App\Seller', 'idseller');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailBills()
    {
        return $this->hasMany('App\DetailBill', 'idproduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany('App\News', 'idproduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productcolors()
    {
        return $this->hasMany('App\Productcolor', 'idproduct');
    }
}
