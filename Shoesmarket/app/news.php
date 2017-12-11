<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class News
 * 
 * @property int $id
 * @property int $idproduct
 * @property string $name_meta
 * @property string $note
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class News extends Eloquent
{
	protected $casts = [
		'idproduct' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'idproduct',
		'name_meta',
		'note',
		'status'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class, 'idproduct');
	}
}
