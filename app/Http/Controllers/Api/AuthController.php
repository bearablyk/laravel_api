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

        if(!$user = UserRepository::getUserByDeviceId($request->device_id)){
            $user = UserRole::findOrFail(UserRole::DEVICE)->users()->create([
                'device_id' => $request->device_id,
            ]);
        }

        return self::getAccessToken($request, 'device', $user->only('subscription_expired_at'));
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
        $request->user()->oauth_access_token()->delete();
        return $this->respondSuccess('Logout successfully');
    }

    protected function getAccessToken($request, $grantType = 'password', $addToResponse = [])
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

        $response = \Route::dispatch($tokenRequest);
        $json = json_decode($response->getContent(), true);
        if(!empty($json['access_token'])){
            $json = array_merge($json, (array)$addToResponse);
        }
        $response->setContent(json_encode($json));

        return $response;
    }
}
