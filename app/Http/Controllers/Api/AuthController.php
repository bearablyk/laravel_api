<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use App\Models\UserRole;

class AuthController extends ApiController
{
    public function deviceSignIn(Request $request)
    {
        if ($errors = $this->validationDeviceSignIn($request)) {
            return $errors;
        }

        if(!UserRepository::getUserByDeviceId($request->device_id)){
            UserRole::findOrFail(UserRole::DEVICE)->users()->create([
                'device_id' => $request->device_id,
            ]);
        }

        return self::getAccessToken($request, 'device');
    }

    protected function validationDeviceSignIn($request)
    {
        $validator = validator($request->only('device_id'), [
            'device_id'  => 'required|string|min:6|max:255',
        ]);

        if ($validator->fails()) {
            return $this->respondValidationError($validator);
        }

        return null;
    }

    public function logout(Request $request)
    {
        $request->user()->oauth_acess_token()->delete();
        return $this->respondSuccess('Logout successfully');
    }

    protected function getAccessToken($request, $grantType = 'password')
    {
        $client = Client::where('password_client', 1)->first();

        $request->request->add([
            'grant_type'    => $grantType,
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
        ]);

        $tokenRequest = Request::create(
            'oauth/token',
            'POST'
        );

        return \Route::dispatch($tokenRequest);
    }
}
