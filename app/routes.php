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
	return "Nothing to see here!";
});

// Create User
Route::post('signup', 'UserController@store');

// Login / Logout
Route::post('login', 'SessionController@store');
Route::any('logout', 'SessionController@logout');

<<<<<<< HEAD
// Receiver route for iron.io push queue
Route::post('queue/receive', function()
{
    return Queue::marshal();
});

Route::group(['before' => 'auth'], function(){
=======
Route::group(['before' => 'auth|owner'], function(){
>>>>>>> develop
	Route::resource('users', 'UserController', ['only' => ['store', 'show', 'update', 'destroy']]);
	Route::resource('palettes', 'PaletteController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
	Route::resource('palettes.colors', 'ColorController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
	Route::resource('images', 'ImageController', ['only' => ['index', 'store', 'show', 'destroy']]);
});
