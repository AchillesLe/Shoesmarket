<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Bill
 * 
 * @property int $id
 * @property int $iduser
 * @property string $housenumber
 * @property string $streetname
 * @property int $countyname
 * @property float $total
 * @property \Carbon\Carbon $created_at
 * @property string $note
 * 
 * @property \App\Models\County $county
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $sellers
 *
 * @package App\Models
 */
class Bill extends Eloquent
{
	protected $table = 'bill';
	public $timestamps = false;

	protected $casts = [
		'iduser' => 'int',
		'countyname' => 'int',
		'total' => 'float'
	];

	protected $fillable = [
		'iduser',
		'housenumber',
		'streetname',
		'countyname',
		'total',
		'note'
	];

	public function county()
	{
		return $this->belongsTo(\App\Models\County::class, 'countyname');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'iduser');
	}

	public function sellers()
	{
		return $this->belongsToMany(\App\Models\Seller::class, 'bill_seller', 'idbill', 'idseller')
					->withPivot('id', 'total', 'shipfee', 'status');
	}
}
