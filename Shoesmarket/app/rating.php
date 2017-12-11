<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Rating
 * 
 * @property int $id
 * @property int $idseller
 * @property int $onestar
 * @property int $twostar
 * @property int $threestar
 * @property int $fourstar
 * @property int $fivestar
 * @property float $average
 * @property int $total
 * 
 * @property \App\Models\Seller $seller
 *
 * @package App\Models
 */
class Rating extends Eloquent
{
	protected $table = 'rating';
	public $timestamps = false;

	protected $casts = [
		'idseller' => 'int',
		'onestar' => 'int',
		'twostar' => 'int',
		'threestar' => 'int',
		'fourstar' => 'int',
		'fivestar' => 'int',
		'average' => 'float',
		'total' => 'int'
	];

	protected $fillable = [
		'idseller',
		'onestar',
		'twostar',
		'threestar',
		'fourstar',
		'fivestar',
		'average',
		'total'
	];

	public function seller()
	{
		return $this->belongsTo(\App\Models\Seller::class, 'idseller');
	}
}
