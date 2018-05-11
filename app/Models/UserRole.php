<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model;

/**
 * Class UserRole
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserRole whereName($value)
 * @mixin \Eloquent
 */
class UserRole extends Model
{
    const ADMIN = 1;
    const DEVICE = 2;

    public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
        'id',
		'name'
	];

	public function users()
	{
		return $this->hasMany(\App\User::class);
	}
}
