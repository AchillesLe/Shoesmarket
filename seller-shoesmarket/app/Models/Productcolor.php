<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Productcolor
 * 
 * @property int $id
 * @property int $idproduct
 * @property string $color
 * @property string $size
 * @property int $quantity
 * 
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class Productcolor extends Eloquent
{
	protected $table = 'productcolor';
	public $timestamps = false;

	protected $casts = [
		'idproduct' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'idproduct',
		'color',
		'size',
		'quantity'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class, 'idproduct');
	}
}
