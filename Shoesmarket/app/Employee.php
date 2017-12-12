<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
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
 * @property string $created_at
 * @property string $updated_at
 * @property Role $role
 * @property Penalize[] $penalizes
 * @property Receipt[] $receipts
 */
class employee extends Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = ['idrole', 'username', 'phone', 'address', 'image', 'status', 'name', 'email', 'password', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role', 'idrole');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penalizes()
    {
        return $this->hasMany('App\Penalize', 'idemployee');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipts()
    {
        return $this->hasMany('App\Receipt', 'idemployee');
    }
}
