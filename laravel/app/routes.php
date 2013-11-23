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


//Mockup App
Route::get('/', function(){
	return Redirect::to('colormatch');
});

Route::controller('colormatch', 'MockupController');

Route::controller('litmus', 'LitmusController');

// Litmus
Route::resource('users', 'UsersController');

Route::resource('accounts', 'AccountsController');

Route::resource('palettes', 'PalettesController');

Route::resource('colors', 'ColorsController');


