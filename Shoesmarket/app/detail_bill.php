<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idbill_seller
 * @property int $idproduct
 * @property float $cost
 * @property int $quantity
 * @property float $total
 * @property int $status
 * @property int $israting
 * @property BillSeller $billSeller
 * @property Product $product
 */
class Detail_bill extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detail_bills';

    /**
     * @var array
     */
    protected $fillable = ['idbill_seller', 'idproduct', 'cost', 'quantity', 'total', 'status', 'israting'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billSeller()
    {
        return $this->belongsTo('App\BillSeller', 'idbill_seller');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'idproduct');
    }
}
