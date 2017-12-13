<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idseller
 * @property int $idemployee
 * @property float $money
 * @property string $reason
 * @property string $created_at
 * @property string $updated_at
 * @property Employee $employee
 * @property Seller $seller
 */
class Penalize extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'penalizes';

    /**
     * @var array
     */
    protected $fillable = ['idseller', 'idemployee', 'money', 'reason', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'idemployee');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo('App\Seller', 'idseller');
    }
}
