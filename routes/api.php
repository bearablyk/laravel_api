<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api', 'middleware' => ['json.request']], function () {
    Route::get('version', 'IndexController@apiVersion');

    Route::group(['prefix' => 'auth'], function () {
        Route::post('device-sign-in', 'AuthController@deviceSignIn');
    });

    //Need Authentification:

    Route::group(['middleware' => 'auth:api'], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::post('logout', 'AuthController@logout');
        });

        Route::group(['prefix' => 'settings'], function () {
            Route::post('/', 'SettingController@index');
        });
    });
});
