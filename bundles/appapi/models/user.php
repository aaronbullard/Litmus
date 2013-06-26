<?php

class User extends Eloquent{
	
	public static $table = 'appapi_users';
	
	
	public static function validate($data){
		//set form rules from config
		$rules = array();
		$form = Config::get('appapi::config.form');
		foreach( $form as $array ){
			$rules[$array['name']] = $array['rule'];
		}
		
		return Validator::make( $data, $rules );
	}
	
	
	public function generate_account_hash($salt){
	
		$string = $this->email . $this->fname . $this->phone . $salt;
		
		$hash = md5($string);

		$validation = User::where_account($hash)->count();
		
		if( $validation > 0 ){
			"Account exists";exit;
			/**
			 * HANDLE ACCOUNT FAILURE HERE
			 */
			return false;
		}else{

			$this->account	= $hash;
			$this->token	= md5( $salt . $salt . time() );
			
			return $this;
		}
	}
	
	
	public static function validate_credentials($account, $token){
		
		$user = User::where_account($account)->where_token($token)->count();
		
		return (bool) $user;
		
	}
	
}