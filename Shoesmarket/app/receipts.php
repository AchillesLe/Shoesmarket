<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idseller
 * @property int $idemployee
 * @property string $namepackage
 * @property int $newquantity
 * @property float $money
 * @property string $created_at
 * @property string $updated_at
 * @property Employee $employee
 * @property Seller $seller
 */
class Receipts extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['idseller', 'idemployee', 'namepackage', 'newquantity', 'money', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\employee', 'idemployee');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo('App\seller', 'idseller');
    }
}
