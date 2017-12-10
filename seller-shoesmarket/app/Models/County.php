<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class County
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $bills
 * @property \Illuminate\Database\Eloquent\Collection $shipfeesellers
 *
 * @package App\Models
 */
class County extends Eloquent
{
	protected $table = 'county';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function bills()
	{
		return $this->hasMany(\App\Models\Bill::class, 'countyname');
	}

	public function shipfeesellers()
	{
		return $this->hasMany(\App\Models\Shipfeeseller::class, 'idCounty');
	}
}
