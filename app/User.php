<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_role_id
 * @property string $device_id
 * @property string|null $email
 * @property string|null $password
 * @property string|null $remember_token
 * @property string|null $one_signal_token
 * @property \Carbon\Carbon $subscription_expired_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereOneSignalToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSubscriptionExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserRoleId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Story[] $stories
 * @property-read \App\Models\UserRole $user_role
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $casts = [
        'user_role_id' => 'int'
    ];

    protected $dates = [
        'subscription_expired_at'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'user_role_id',
        'device_id',
        'email',
        'password',
        'remember_token',
        'one_signal_token',
        'subscription_expired_at'
    ];

    public function user_role()
    {
        return $this->belongsTo(\App\Models\UserRole::class);
    }

    public function stories()
    {
        return $this->belongsToMany(\App\Models\Story::class)
            ->withPivot('is_readed');
    }

    public function oauth_access_token()
    {
        return $this->hasMany(\App\Models\OauthAccessToken::class);
    }
}
