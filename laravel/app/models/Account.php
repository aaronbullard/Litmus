<?php

class Account extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'account' => 'required',
		'token' => 'required',
		'user_id' => 'required'
	);
}
