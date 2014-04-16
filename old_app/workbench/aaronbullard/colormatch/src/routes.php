<?php

//Mockup App
Route::get('/', function(){
	return "Here!!!";
	// return Redirect::to('colormatch');
});
/*
Route::post('colormatch/login', array('as' => 'login', 'uses' => 'ColormatchController@post_login'));
//*/

Route::controller('colormatch', 'ColormatchController');
