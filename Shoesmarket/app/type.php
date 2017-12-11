<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Type
 * 
 * @property int $id
 * @property string $name
 * @property int $isdelete
 * @property string $namemeta
 * @property string $description
 * 
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class Type extends Eloquent
{
	protected $table = 'type';
	public $timestamps = false;

	protected $casts = [
		'isdelete' => 'int'
	];

	protected $fillable = [
		'name',
		'isdelete',
		'namemeta',
		'description'
	];

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class, 'idtype');
	}
}
