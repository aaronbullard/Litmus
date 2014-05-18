<?php namespace Aaronbullard\Litmus;

use Alias;
use Illuminate\Support\ServiceProvider;

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
		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
		$loader->alias('Aaronbullard\Litmus\Commands\ImageColorAnalysisFacade', 'Aaronbullard\Litmus\Commands\ImageColorAnalysis');
		$loader->alias('Aaronbullard\Litmus\Commands\PostToCallbackFacade', 'Aaronbullard\Litmus\Commands\PostToCallback');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerImageRepositoryInterface();
		$this->registerImageColorAnalysis();
		$this->registerPostToCallback();
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

	protected function registerImageRepositoryInterface()
	{
		$this->app->bind('Aaronbullard\Litmus\Repositories\ImageRepositoryInterface', function(){
			return Repositories\EloquentImageRepository(new \Image);
		});
	}

	protected function registerImageColorAnalysis()
	{
		$this->app->bind('Aaronbullard\Litmus\Commands\ImageColorAnalysis', function($app){
			$imAnalysis = new Commands\ImageColorAnalysis($app['Aaronbullard\Litmus\Repositories\ImageRepositoryInterface']);
			$imAnalysis->setLitmusHandler(new Services\LitmusServiceHandler);
			return $imAnalysis;
		});
	}

	protected function registerPostToCallback()
	{
		$this->app->bind('Aaronbullard\Litmus\Commands\PostToCallback', function($app){
			return new Commands\PostToCallback($app['Aaronbullard\Litmus\Repositories\ImageRepositoryInterface']);
		});
	}
}
