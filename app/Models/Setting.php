<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model;

/**
 * Class Setting
 *
 * @property string $key
 * @property string $value
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereValue($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
	protected $primaryKey = 'key';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'value'
	];
}
