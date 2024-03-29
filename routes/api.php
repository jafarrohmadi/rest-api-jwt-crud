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

Route::group(['prefix' => 'V1'], function () {

	Route::post('register', 'V1\AuthController@register');
	Route::post('login', 'V1\AuthController@login');

	Route::group(['middleware' => 'jwt.auth'], function () {
		Route::resource('book', 'V1\BookController');
		Route::get('user', 'V1\AuthController@getAuthenticatedUser');
	});
});