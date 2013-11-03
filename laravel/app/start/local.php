<?php

/***************************************
*
* Register Dependency Injection
*
* **************************************/

App::bind('litmus', function($app){
	$account 	= Config::get('mockup.litmus.account');
	$token 		= Config::get('mockup.litmus.token');
 	return new Litmus\Api\Litmus($account, $token);
});

App::bind('LitmusInterface', 'litmus');

App::bind('MockupController', function($app){
	$view   = View::make('mockup.pages.home');
	$litmus = App::make('litmus');
	return new MockupController($view, new User, $litmus);
});

App::bind('LitmusController', function($app){
	return new LitmusController( App::make('litmus') );
});


/***************************************
*
* Register View Composers
*
* **************************************/

View::composer('mockup.pages.home', function($view){
	$view->nest('navbar', 'mockup.partials.navbar')
		->with('title', "Image Upload")
		->with('lead', "Upload your sample image for analysis");		
});