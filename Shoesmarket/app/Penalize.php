<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Penalize
 * 
 * @property int $id
 * @property int $idseller
 * @property int $idemployee
 * @property float $money
 * @property string $reason
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Employee $employee
 * @property \App\Models\Seller $seller
 *
 * @package App\Models
 */
class Penalize extends Eloquent
{
	protected $table = 'penalize';

	protected $casts = [
		'idseller' => 'int',
		'idemployee' => 'int',
		'money' => 'float'
	];

	protected $fillable = [
		'idseller',
		'idemployee',
		'money',
		'reason'
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
