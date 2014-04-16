<?php

class Payment extends BaseModel implements CurrencyInterface{
	
	use CurrencyTrait;
	
	protected $hidden = array('object');
	protected $guarded = array();


	public static $rules = array(
		'wager_id'	=> 'required|exists:wagers,id',
		'user_id'	=> 'required|exists:users,id',
		// 'biller_id' => '',
		// 'biller_type' => '',
		'provider' 	=> 'required|in:Stripe,PayPal,Authorize.net',
		'action'	=> 'in:charge,refund',
		'amount'	=> 'required|numeric|min:10|regex:/[05](?:\.0+)?$/',
		'successful'=> 'in:T,F'
	);

	public function wager()
	{
		return $this->belongsTo('Wager');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function collection()
	{
		return $this->hasOne('Collection');
	}

}
