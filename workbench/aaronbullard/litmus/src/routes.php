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

Route::controller('api', 'LitmusController');

// Litmus
Route::resource('users', 'UsersController');
Route::resource('accounts', 'AccountsController');

Route::get('palettes/{palette_id}/colors', ['as' => 'palettes.colors', 'uses' => 'ColorsController@index']);
Route::resource('palettes', 'PalettesController');
Route::resource('colors', 'ColorsController');
