<?php namespace Api\Workers;

use Illuminate\Support\ServiceProvider;

class WorkersServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// $this->app->bind('Api\Workers\ProcessImage', function($app){
		// 	$litmus = new Aaronbullard\Litmus\Services\LitmusService;
		// 	return new Api\Workers\ProcessImage($litmus);
		// });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}