<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DetailBill
 * 
 * @property int $id
 * @property int $idbill_seller
 * @property int $idproduct
 * @property float $cost
 * @property int $quantity
 * @property float $total
 * @property int $status
 * 
 * @property \App\Models\BillSeller $bill_seller
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class DetailBill extends Eloquent
{
	protected $table = 'detail_bill';
	public $timestamps = false;

	protected $casts = [
		'idbill_seller' => 'int',
		'idproduct' => 'int',
		'cost' => 'float',
		'quantity' => 'int',
		'total' => 'float',
		'status' => 'int'
	];

	protected $fillable = [
		'idbill_seller',
		'idproduct',
		'cost',
		'quantity',
		'total',
		'status'
	];

	public function bill_seller()
	{
		return $this->belongsTo(\App\Models\BillSeller::class, 'idbill_seller');
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class, 'idproduct');
	}
}
