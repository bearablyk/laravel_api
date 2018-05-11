<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model;

/**
 * Class Tag
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Database\Eloquent\Collection $stories
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereName($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function stories()
	{
		return $this->belongsToMany(\App\Models\Story::class);
	}
}
