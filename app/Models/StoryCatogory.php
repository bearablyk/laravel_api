<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model;

/**
 * Class StoryCatogory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Database\Eloquent\Collection $stories
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryCatogory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoryCatogory whereName($value)
 * @mixin \Eloquent
 */
class StoryCatogory extends Model
{
    const FEATURED = 1;
    const TRENDING = 2;
    const NEW = 3;

	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'id',
		'name'
	];

	public function stories()
	{
		return $this->hasMany(\App\Models\Story::class);
	}
}
