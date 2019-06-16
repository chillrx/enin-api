<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Outside data
Route::get('cnpj', 'OutsideController@getCNPJ');
Route::get('cep', 'OutsideController@getCEP');

// Activity
Route::get('groups', 'GroupController@getAll');
Route::get('subgroups', 'SubgroupController@getAll');
Route::get('products', 'ProductController@getAll');

// Register
Route::post('participant/register', 'ParticipantController@register');

