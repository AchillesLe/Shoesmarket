<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idproduct
 * @property string $name_meta
 * @property string $note
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 */
class News extends Model
{
    /**
     * @var array
     */
    protected $table = "news";
    protected $fillable = ['idproduct', 'name_meta', 'note', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'idproduct');
    }
}
