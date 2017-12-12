<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $iduser
 * @property int $countyname
 * @property string $housenumber
 * @property string $streetname
 * @property float $total
 * @property string $created_at
 * @property string $note
 * @property County $county
 * @property User $user
 * @property BillSeller[] $billSellers
 */
class Bill extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bills';

    /**
     * @var array
     */
    protected $fillable = ['iduser', 'countyname', 'housenumber', 'streetname', 'total', 'created_at', 'note'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function county()
    {
        return $this->belongsTo('App\County', 'countyname');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'iduser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billSellers()
    {
        return $this->hasMany('App\BillSeller', 'idbill');
    }
}
