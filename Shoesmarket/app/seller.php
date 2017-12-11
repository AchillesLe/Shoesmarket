<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Seller
 * 
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $phone
 * @property int $sex
 * @property string $identification
 * @property int $newsquantity
 * @property int $isblock
 * @property string $reason
 * @property string $image
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $bills
 * @property \Illuminate\Database\Eloquent\Collection $penalizes
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property \Illuminate\Database\Eloquent\Collection $ratings
 * @property \Illuminate\Database\Eloquent\Collection $receipts
 * @property \Illuminate\Database\Eloquent\Collection $shipfeesellers
 *
 * @package App\Models
 */
class Seller extends Eloquent
{
	protected $table = 'seller';

	protected $casts = [
		'sex' => 'int',
		'newsquantity' => 'int',
		'isblock' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'username',
		'email',
		'password',
		'address',
		'phone',
		'sex',
		'identification',
		'newsquantity',
		'isblock',
		'reason',
		'image',
		'remember_token'
	];

	public function bills()
	{
		return $this->belongsToMany(\App\Models\Bill::class, 'bill_seller', 'idseller', 'idbill')
					->withPivot('id', 'total', 'shipfee', 'status');
	}

	public function penalizes()
	{
		return $this->hasMany(\App\Models\Penalize::class, 'idseller');
	}

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class, 'idseller');
	}

	public function ratings()
	{
		return $this->hasMany(\App\Models\Rating::class, 'idseller');
	}

	public function receipts()
	{
		return $this->hasMany(\App\Models\Receipt::class, 'idseller');
	}

	public function shipfeesellers()
	{
		return $this->hasMany(\App\Models\Shipfeeseller::class, 'idseller');
	}
}
