<?php namespace Aaronbullard\LaravelStripe\Billing\Repositories;

interface BillingRepositoryInterface{

	public function getByUserId($user_id);
	
}