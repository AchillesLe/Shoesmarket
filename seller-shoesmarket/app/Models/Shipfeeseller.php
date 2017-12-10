<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Shipfeeseller
 * 
 * @property int $id
 * @property int $idseller
 * @property int $idCounty
 * @property float $shipfee
 * 
 * @property \App\Models\County $county
 * @property \App\Models\Seller $seller
 *
 * @package App\Models
 */
class Shipfeeseller extends Eloquent
{
	protected $table = 'shipfeeseller';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idseller' => 'int',
		'idCounty' => 'int',
		'shipfee' => 'float'
	];

	protected $fillable = [
		'idseller',
		'idCounty',
		'shipfee'
	];

	public function county()
	{
		return $this->belongsTo(\App\Models\County::class, 'idCounty');
	}

	public function seller()
	{
		return $this->belongsTo(\App\Models\Seller::class, 'idseller');
	}
}
