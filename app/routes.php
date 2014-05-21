<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$box = new Litmus\Entities\Box([25, 25, 75, 75]);

	return $box->toJson();

	return "welcome";
});

// Create User
Route::post('signup', 'UserController@store');

// Login / Logout
Route::post('login', 'SessionController@store');
Route::any('logout', 'SessionController@logout');

Route::group(['before' => 'auth|owner'], function(){
	Route::resource('users', 'UserController', ['only' => ['store', 'show', 'update', 'destroy']]);
	Route::resource('palettes', 'PaletteController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
	Route::resource('palettes.colors', 'ColorController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
	Route::resource('images', 'ImageController', ['only' => ['index', 'store', 'show', 'destroy']]);
});
