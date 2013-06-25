<?php

class User extends Eloquent{
	
	public static $table = 'appapi_users';
	
	public static $rules = array(
		'email'		=>	'unique:appapi_users|required|email',
		'fname'		=>	'required',
		'lname'		=>	'required',
		'street'	=>	'required',
		'city'		=>	'required',
		'state'		=>	'required|size:2|alpha',
		'zipcode'	=>	'required|size:5',
		'phone'		=>	'required|match:^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$^',
		'account'	=>	'unique:appapi_users'
	);

	public static function validate($data){
		return Validator::make( $data, static::$rules );
	}
	
	
	public function generate_account_hash($salt){
	
		$string = $this->email . $this->fname . $this->phone . $salt;
		
		$hash = hash('sha256', $string);

		$validation = User::where_account($hash)->count();
		
		if( $validation > 0 ){
			"Account exists";exit;
			/**
			 * HANDLE ACCOUNT FAILURE HERE
			 */
			return false;
		}else{

			$this->account	= $hash;
			$this->token	= hash('sha256', $salt . $salt . time());
			
			return $this;
		}
	}
	
	
	public static function validate_credentials($account, $token){
		
		$user = User::where_account($account)->where_token($token)->count();
		
		return (bool) $user;
		
	}
	
}