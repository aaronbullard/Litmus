<?php

class Account extends Eloquent implements AccountInterface{

	protected $guarded = array();

	public static $rules = array(
		'account' => 'required',
		'token' => 'required',
		'user_id' => 'required'
	);


	public function user()
	{
		return $this->belongsTo('User');
	}

	public function validateCredentials($account, $token)
	{
		$count = $this->whereAccount($account)->whereToken($token)->count();

		return $count > 0 ? TRUE : FALSE;
	}
}
