<?php

Route::group(['prefix' => 'api'], function(){

	Route::get('/', function(){
		return "hellow W";
	});

});

// Route::controller('api', 'LitmusController');