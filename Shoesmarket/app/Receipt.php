<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Receipt
 * 
 * @property int $id
 * @property int $idseller
 * @property int $idemployee
 * @property string $namepackage
 * @property int $newquantity
 * @property float $money
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Employee $employee
 * @property \App\Models\Seller $seller
 *
 * @package App\Models
 */
class Receipt extends Eloquent
{
	protected $casts = [
		'idseller' => 'int',
		'idemployee' => 'int',
		'newquantity' => 'int',
		'money' => 'float'
	];

	protected $fillable = [
		'idseller',
		'idemployee',
		'namepackage',
		'newquantity',
		'money'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class, 'idemployee');
	}

	public function seller()
	{
		return $this->belongsTo(\App\Models\Seller::class, 'idseller');
	}
}
