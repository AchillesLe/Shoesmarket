<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idbill
 * @property int $idseller
 * @property float $total
 * @property int $shipfee
 * @property int $status
 * @property Bill $bill
 * @property Seller $seller
 * @property DetailBill[] $detailBills
 */
class Bill_seller extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bill_sellers';

    /**
     * @var array
     */
    protected $fillable = ['idbill', 'idseller', 'total', 'shipfee', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bill()
    {
        return $this->belongsTo('App\Bill', 'idbill');
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
        return $this->hasMany('App\DetailBill', 'idbill_seller');
    }
}
