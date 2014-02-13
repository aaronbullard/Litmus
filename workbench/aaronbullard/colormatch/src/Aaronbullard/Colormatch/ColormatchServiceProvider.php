<?php namespace Aaronbullard\Colormatch;

use ColormatchController;
use Illuminate\Support\ServiceProvider;

class ColormatchServiceProvider extends ServiceProvider {

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
		$this->package('aaronbullard/colormatch');
		$this->registerColormatchController();
		include __DIR__.'/../../routes.php';
	}

	public function boot()
	{
		include __DIR__.'/../../start/global.php';
	}

	public function registerColormatchController()
	{
		$this->app->bind('ColormatchController', function($app){
			$view   = $this->app->make('view')->make('layouts.scaffold');
			return new ColormatchController($view);
		});
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