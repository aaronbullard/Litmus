<?php namespace Aaronbullard\LaravelStripe;

use Config;
use StripeCustomer;
use Aaronbullard\LaravelStripe\Billing\StripeBilling;
use Aaronbullard\LaravelStripe\Billing\BillingInterface;

use Illuminate\Support\ServiceProvider;

class LaravelStripeServiceProvider extends ServiceProvider {

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
		$this->app->bind('Aaronbullard\LaravelStripe\Billing\StripeBilling', function($app)
		{
			$public_key = Config::get('laravel-stripe::stripe.public_key');
			$secret_key = Config::get('laravel-stripe::stripe.secret_key');
			return new StripeBilling($public_key, $secret_key, new StripeCustomer);
		});
		$this->app->bind('Aaronbullard\LaravelStripe\Billing\BillingInterface', 
			'Aaronbullard\LaravelStripe\Billing\StripeBilling');
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