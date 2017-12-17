<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nameFrom
 * @property string $mailFrom
 * @property string $nameTo
 * @property string $mailTo
 * @property string $title
 * @property string $content
 * @property string $created_at
 */
class Email extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nameFrom', 'mailFrom', 'nameTo', 'mailTo', 'title', 'content', 'created_at'];

}
