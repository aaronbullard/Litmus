<?php namespace Litmus;

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
		$this->app->bind('Litmus\Repositories\EloquentImageRepository', function(){
			return new Repositories\EloquentImageRepository(new \Image);
		});
		$this->app->bind('Litmus\Repositories\ImageRepositoryInterface', 'Litmus\Repositories\EloquentImageRepository');
	}

	protected function registerImageColorAnalysis()
	{
		$this->app->bind('Litmus\Commands\ImageColorAnalysis', function($app){
			$imAnalysis = new Commands\ImageColorAnalysis($app['Litmus\Repositories\ImageRepositoryInterface']);
			$imAnalysis->setColorHandler(new Services\LitmusServiceHandler);
			return $imAnalysis;
		});
	}

	protected function registerPostToCallback()
	{
		$this->app->bind('Litmus\Commands\PostToCallback', function($app){
			$post = new Commands\PostToCallback($app['Litmus\Repositories\ImageRepositoryInterface']);
			$post->setHttpHandler( new \GuzzleHttp\Client() );
			return $post;
		});
	}
}
