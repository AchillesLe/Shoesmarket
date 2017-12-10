<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BillSeller
 * 
 * @property int $id
 * @property int $idbill
 * @property int $idseller
 * @property float $total
 * @property int $shipfee
 * @property int $status
 * 
 * @property \App\Models\Bill $bill
 * @property \App\Models\Seller $seller
 * @property \Illuminate\Database\Eloquent\Collection $detail_bills
 *
 * @package App\Models
 */
class BillSeller extends Eloquent
{
	protected $table = 'bill_seller';
	public $timestamps = false;

	protected $casts = [
		'idbill' => 'int',
		'idseller' => 'int',
		'total' => 'float',
		'shipfee' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'idbill',
		'idseller',
		'total',
		'shipfee',
		'status'
	];

	public function bill()
	{
		return $this->belongsTo(\App\Models\Bill::class, 'idbill');
	}

	public function seller()
	{
		return $this->belongsTo(\App\Models\Seller::class, 'idseller');
	}

	public function detail_bills()
	{
		return $this->hasMany(\App\Models\DetailBill::class, 'idbill_seller');
	}
}
