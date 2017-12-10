<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $isblock
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $bills
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $table = 'user';

	protected $casts = [
		'isblock' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'phone',
		'isblock',
		'email',
		'password',
		'remember_token'
	];

	public function bills()
	{
		return $this->hasMany(\App\Models\Bill::class, 'iduser');
	}
}
