<?php

class Account extends Eloquent {

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
}
