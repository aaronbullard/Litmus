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
	return View::make('hello');
});

Route::get('/colors', function(){
	return Color::with('palette')->get();
});

Route::group(['before' => 'auth'], function(){
	Route::resource('users', 'UserController', ['only' => ['store', 'show', 'update', 'destroy']]);
	Route::resource('palettes', 'PaletteController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
	Route::resource('palettes.colors', 'ColorController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
});
