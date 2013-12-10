<?php

use Litmus\Api\Litmus;
use Litmus\Entities\Rgba;
use Litmus\Entities\ColorAnalysis;
use Litmus\Services\LitmusHandler;

/***************************************
*
* Register Dependency Injection
*
* **************************************/

App::bind('litmus', function($app){
	$account 	= Config::get('mockup.litmus.account');
	$token 		= Config::get('mockup.litmus.token');
 	return new Litmus($account, $token);
});

App::bind('MockupMobileController', function($app){
	$view   = View::make('mobile.multiPage');
	$litmus = App::make('litmus');
	return new MockupMobileController($view, new User, $litmus);
});

App::bind('LitmusController', function($app){
	return new LitmusController( new Account );
});

App::bind('Litmus\Strategies\Ambient\AmbientInterface', 'Litmus\Strategies\Ambient\DimensionAverage');

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