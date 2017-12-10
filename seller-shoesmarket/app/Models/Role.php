<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	protected $table = 'role';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function employees()
	{
		return $this->hasMany(\App\Models\Employee::class, 'idrole');
	}
}
