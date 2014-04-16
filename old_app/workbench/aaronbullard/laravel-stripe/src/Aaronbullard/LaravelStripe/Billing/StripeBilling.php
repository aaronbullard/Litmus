<?php namespace Aaronbullard\LaravelStripe\Billing;

use Stripe;
use Stripe_Charge;
use Stripe_Customer;
use Stripe_InvalidRequestError;
use Stripe_CardError;
use Stripe_Error;
use Exception;

use StripeCustomer;

class StripeBilling implements BillingInterface {

	protected $stripe_customer_id;
	protected $secret_key;
	protected $public_key;
	protected $callback;
	protected $repository;
	protected $provider;
	protected $tokenName;

	public function __construct($public_key, $secret_key, StripeCustomer $repository)
	{
		Stripe::setApiKey($secret_key);
		$this->stripe_customer_id = NULL;
		$this->public_key = $public_key;
		$this->secret_key = $secret_key;
		$this->repository = $repository;
		$this->provider = 'Stripe';
		$this->tokenName = 'stripeToken';
		return $this;
	}

	public function createCustomer($token, $email)
	{
		$customer = Stripe_Customer::create([
			'card' 			=> $token,
			'description' 	=> $email
		]);

		$this->callback = $customer;
		$this->setCustomerId($customer->id);

		return $customer;
	}

	public function getCustomerId()
	{
		return is_null($this->stripe_customer_id) ? FALSE : $this->stripe_customer_id;
	}

	public function setCustomerId($customerId)
	{
		$this->stripe_customer_id = $customerId;
		return $this;
	}

	public function chargeCustomer($customerId, $amount, $description = 'BYC')
	{
		$this->setCustomerId($customerId);
		
		return $this->charge(array(
				'amount' 		=> $amount,
				'description' 	=> $description
			));
	}

	public function charge(array $data)
	{
		// Set the customer id
		if( ! $this->getCustomerId() )
		{
			$customer = $this->createCustomer($data['token'], $data['email']);
			$this->setCustomerId($customer->id);
		}

		$this->callback = Stripe_Charge::create([
			'customer' 	=> $this->getCustomerId(),
			'amount' 	=> $data['amount'],
			'currency' 	=> isset($data['currency']) ? $data['currency'] : 'usd',
			'description' => isset($data['description']) ? $data['description'] : 'BYC'
		]);

		return $this->callback;
	}

	public function getCustomer($customerId)
	{
		return  Stripe_Customer::retrieve($customerId);
	}

	public function getCallback()
	{
		if( is_null($this->callback) ) throw new Exception("There is no callback.  You must execute a Stripe Charge first.");

		return $this->callback;
	}

	public function getRepository()
	{
		return $this->repository;
	}

	public function getProvider()
	{
		return $this->provider;
	}

	public function getTokenName()
	{
		return $this->tokenName;
	}
}