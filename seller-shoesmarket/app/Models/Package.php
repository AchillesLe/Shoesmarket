<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Package
 * 
 * @property int $id
 * @property string $name
 * @property int $newquantity
 * @property float $money
 *
 * @package App\Models
 */
class Package extends Eloquent
{
	protected $table = 'package';
	public $timestamps = false;

	protected $casts = [
		'newquantity' => 'int',
		'money' => 'float'
	];

	protected $fillable = [
		'name',
		'newquantity',
		'money'
	];
}
