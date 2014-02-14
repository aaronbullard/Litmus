<?php

class User extends Eloquent{
	
	public static $table = 'users';
	
	public static $hidden = array('id', 'token');
	
	public static $accessible = array('email', 'firstname', 'lastname', 'street',
										'city', 'state', 'zipcode', 'phone',
										'account', 'created_at', 'updated_at');
	
	public function palettes(){
		return $this->hasMany('Palette');
	}
	
	
	public static function validate($data){
		//set form rules from config
		$rules = array();
		$form = Config::get('litmus::config.form.user');
		foreach( $form as $array ){
			$rules[$array['name']] = $array['rule'];
		}
		
		return Validator::make( $data, $rules );
	}
	
	
	public function generate_account_hash($salt){
	
		$string = $this->email . $this->fname . $this->phone . $salt;
		
		$hash = md5($string);

		$validation = User::whereAccount($hash)->count();
		
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
		
		$user = User::whereAccount($account)->whereToken($token)->count();
		
		return (bool) $user;
		
	}
	
}