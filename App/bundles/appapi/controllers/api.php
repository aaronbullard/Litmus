<?php


class Appapi_Api_Controller extends Base_Controller{
	

	public $restful = true;
	
	protected $user_table = array();
	
	public function __construct(){
		
		foreach( Config::get('appapi::config.form') as $array){
			$this->user_table[] = $array['name'];
		}
		
	}

	/**
	 * 
	 * This is only a test method
	 */
	public function get_validate($account, $token){
//		$account = Input::get('account');
//		$token	 = Input::get('token');

		$bool = User::validate_credentials($account, $token);
		
		if( $bool ){
			return Response::json(true);
		}else{
			return Response::json(false);
		}
			
	}
	
	
	public function get_register(){
		
		return View::make('appapi::form')->with_form(Config::get('appapi::config.form'));
	}
	
	
	public function post_register(){

		$data = array();
		
		foreach( $this->user_table as $field ){
		
			$data[$field] = Input::get( $field );
		}
		
		//Validate input		
		$validation = User::validate( $data );

		if( $validation->fails() ){

			return Redirect::to('api/register')->with_errors($validation)->with_input();
			
		}else{
			
			//Save user
			$user = new User( $data );
			$user->save();

			/**
			 * Generate Account and Token
			 */
			$user = $user->generate_account_hash( Config::get('appapi::config.private_key') );
			$user->save();
			
			/**
			 * Email Account and Token to new user
			 */

			$status = "User added successfully!  Login credentials have been sent to: '{$user->email}'.";
			return Redirect::to('api/register')->with('status', $status);
		}
	}
	


}