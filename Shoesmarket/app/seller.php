<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
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
 * @property string $created_at
 * @property string $updated_at
 * @property BillSeller[] $billSellers
 * @property Penalize[] $penalizes
 * @property Product[] $products
 * @property Rating[] $ratings
 * @property Receipt[] $receipts
 * @property Shipfeeseller[] $shipfeesellers
 */
class seller extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'seller';

    /**
     * @var array
     */
    protected $fillable = ['name', 'username', 'email', 'password', 'address', 'phone', 'sex', 'identification', 'newsquantity', 'isblock', 'reason', 'image', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billSellers()
    {
        return $this->hasMany('App\BillSeller', 'idseller');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penalizes()
    {
        return $this->hasMany('App\Penalize', 'idseller');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'idseller');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany('App\Rating', 'idseller');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipts()
    {
        return $this->hasMany('App\Receipt', 'idseller');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipfeesellers()
    {
        return $this->hasMany('App\Shipfeeseller', 'idseller');
    }
}
