<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use Notifiable;
    protected $guard = 'seller';
    protected $table = 'seller';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $casts = [
        'sex' => 'int',
        'newsquantity' => 'int',
        'isblock' => 'int'
    ];

    protected $fillable = [
        'name', 'username', 'email', 'password', 'address', 'phone', 'sex', 'identification', 'newsquantity', 'isblock', 'reason', 'image', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
