<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
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
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Type $type
 * @property \App\Models\Seller $seller
 * @property \Illuminate\Database\Eloquent\Collection $detail_bills
 * @property \Illuminate\Database\Eloquent\Collection $news
 * @property \Illuminate\Database\Eloquent\Collection $productcolors
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	protected $table = 'product';

	protected $casts = [
		'idseller' => 'int',
		'idtype' => 'int',
		'quantity' => 'int',
		'price' => 'float',
		'size' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'idseller',
		'idtype',
		'name',
		'quantity',
		'price',
		'size',
		'sex',
		'image',
		'status'
	];

	public function type()
	{
		return $this->belongsTo(\App\Models\Type::class, 'idtype');
	}

	public function seller()
	{
		return $this->belongsTo(\App\Models\Seller::class, 'idseller');
	}

	public function detail_bills()
	{
		return $this->hasMany(\App\Models\DetailBill::class, 'idproduct');
	}

	public function news()
	{
		return $this->hasMany(\App\Models\News::class, 'idproduct');
	}

	public function productcolors()
	{
		return $this->hasMany(\App\Models\Productcolor::class, 'idproduct');
	}
}
