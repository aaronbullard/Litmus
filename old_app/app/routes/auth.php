<?php

// Login
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@index']);
Route::post('login', ['as' => 'login.validate', 'uses' => 'AuthController@validate']);

// Sign up
Route::get('users/create', 'UsersController@create');
Route::post('users/store', 'UsersController@store');

// Logout
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

// Authenticated
Route::group(['before' => "auth"], function(){

	Route::get('/', ['as' => 'home', 'uses' => 'AccountsController@index']);
	Route::resource('users', 'UsersController');
	Route::resource('accounts', 'AccountsController');

});