<?php

use Illuminate\Support\Facades\Route;

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

Route::post('register', 'AuthnController@register');
Route::post('login', 'AuthnController@login');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('profile', 'AuthnController@profile');
    Route::post('users/create-accounts', 'UserController@create');
    Route::put('update-profiles', 'AuthnController@update');
    Route::put('change-passwords', 'AuthnController@changePassword');
});
