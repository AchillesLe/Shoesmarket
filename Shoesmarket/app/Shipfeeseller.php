<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idseller
 * @property int $idCounty
 * @property float $shipfee
 * @property County $county
 * @property Seller $seller
 */
class Shipfeeseller extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'shipfeesellers';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['idseller', 'idCounty', 'shipfee'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function county()
    {
        return $this->belongsTo('App\County', 'idCounty');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo('App\Seller', 'idseller');
    }
}
