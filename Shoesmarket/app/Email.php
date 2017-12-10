<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 11:28:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Email
 * 
 * @property int $id
 * @property string $nameFrom
 * @property string $mailFrom
 * @property string $nameTo
 * @property string $mailTo
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon $created_at
 *
 * @package App\Models
 */
class Email extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'nameFrom',
		'mailFrom',
		'nameTo',
		'mailTo',
		'title',
		'content'
	];
}
