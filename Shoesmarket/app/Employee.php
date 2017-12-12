<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property int $idrole
 * @property string $username
 * @property string $phone
 * @property string $address
 * @property string $image
 * @property int $status
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $penalizes
 * @property \Illuminate\Database\Eloquent\Collection $receipts
 *
 * @package App\Models
 */
class Employee extends Eloquent
{
	protected $casts = [
		'idrole' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'idrole',
		'username',
		'phone',
		'address',
		'image',
		'status',
		'name',
		'email',
		'password',
		'remember_token'
	];

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'idrole');
	}

	public function penalizes()
	{
		return $this->hasMany(\App\Models\Penalize::class, 'idemployee');
	}

	public function receipts()
	{
		return $this->hasMany(\App\Models\Receipt::class, 'idemployee');
	}
}
