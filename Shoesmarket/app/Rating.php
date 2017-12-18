<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idseller
 * @property int $onestar
 * @property int $twostar
 * @property int $threestar
 * @property int $fourstar
 * @property int $fivestar
 * @property float $average
 * @property int $total
 * @property Seller $seller
 */
class Rating extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ratings';

    /**
     * @var array
     */
    protected $fillable = ['idseller', 'onestar', 'twostar', 'threestar', 'fourstar', 'fivestar', 'average', 'total'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo('App\Seller', 'idseller');
    }
}
