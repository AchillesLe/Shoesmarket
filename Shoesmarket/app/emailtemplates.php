<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class emailtemplates extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'content', 'created_at', 'updated_at'];

}
