<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    static function getUserByDeviceId($deviceId)
    {
        return User::where('device_id', $deviceId)->first();
    }

    static function getModel($model = false)
    {
        if (!$model) {
            return request()->user();
        }
        return $model = is_object($model) ? $model : User::findOrFail($model);
    }
}