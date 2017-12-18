<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;
/**
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $isblock
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Bill[] $bills
 */
class User extends Authenticatable
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    use Notifiable;
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = ['name', 'phone', 'isblock', 'email', 'password', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bills()
    {
        return $this->hasMany('App\Bill', 'iduser');
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
