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

// Route::group(array('domain' => 'api.myapp.com'), function()
// {
//     Route::get('api', function($account, $id)
//     {
//         //
//     });
// });
Route::controller('api', 'LitmusController');

// Litmus
Route::resource('users', 'UsersController');

Route::resource('accounts', 'AccountsController');

Route::resource('palettes', 'PalettesController');

Route::resource('colors', 'ColorsController');
