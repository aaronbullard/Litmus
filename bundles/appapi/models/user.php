<?php

class User extends Eloquent{
	
	public static $table = 'appapi_users';
	
	public static $rules = array(
		'email'		=>	'required|unique|email',
		'fname'		=>	'required',
		'lname'		=>	'required',
		'street'	=>	'required',
		'city'		=>	'required',
		'state'		=>	'required|size:2|alpha',
		'zipcode'	=>	'required|size:5|numeric',
		'phone'		=>	'required|match:^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$',
	);

	public static function validate($data){
		return Validator::make( $data, static::$rules );
	}
	
}