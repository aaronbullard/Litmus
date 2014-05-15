<?php namespace Aaronbullard\Litmus;

use Illuminate\Support\ServiceProvider;

use Config;
use CatchoomRecognition;
use Aaronbullard\Litmus\ImageRecognition\CatchoomImageRecognition;

class LitmusServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('aaronbullard/litmus');
		require __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerImageRecognitionService();
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

	protected function registerImageRecognitionService()
	{
		$this->app->bind('imagerecognition', function($app){
			$token = Config::get('litmus::catchoom.token');
			$api = new CatchoomRecognition(CatchoomRecognition::API_VERSION_1, $token);
			return new CatchoomImageRecognition($api);
		});
	}

}
