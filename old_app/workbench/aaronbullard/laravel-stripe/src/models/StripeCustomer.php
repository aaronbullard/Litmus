<?php

use BetYourCharity\Billing\Repositories\BillingRepositoryInterface;

class StripeCustomer extends BaseModel implements BillingRepositoryInterface {
	
	protected $guarded = array();

	protected $table = 'stripecustomers';

	public static $rules = array(
		'user_id'		=> 'required|exists:users,id',
		'customerId'	=> 'required|alpha_dash'
	);


	public function user(){
		return $this->belongsTo('User');
	}

	public function getType(){
		return 'StripeCustomer';
	}

	public function getByUserId($user_id)
	{
		return $this->where('user_id', '=', $user_id)->first();
	}

}
