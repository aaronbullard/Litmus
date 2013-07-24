<?php


class Appapi_Api_Controller extends Base_Controller{
	

	public $restful = true;
	
	protected $user_table = array();
	
	public function __construct(){
		
		foreach( Config::get('appapi::config.form') as $array){
			$this->user_table[] = $array['name'];
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

			//Generate Account and Token
			$user = $user->generate_account_hash( Config::get('appapi::config.private_key') );
			$user->save();
			
			/**
			 * Email Account and Token to new user
			 */

			$status = "User added successfully!  Login credentials have been sent to: '{$user->email}'.";
			
			return Redirect::to('api/register')->with('status', $status);
		}
	}
	
	
	public function get_user($account, $token){

		$this->check_account_and_token($account, $token);
		
		$user = User::where_account($account)->where_token($token)->first();

		$rest = new Rest;

		if( $user ){
			$rest->status			= 'success';
			$rest->data['result']	= $user->to_array();
			$rest->message			= 'User account: '.$account;
		}else{
			$rest->status	= 'error';
			$rest->message	= 'Login credentials are not valid.';
		}

		return Response::json($rest);
	}
	
	
	public function post_user($account, $token){
		
		$this->check_account_and_token($account, $token);
		
		$user = User::where_account($account)->where_token($token)->first();
		
		$update = Input::all();
		
		foreach($update as $field => $value){
			if( isset($user->$field) ){
				$user->$field = $value;
			}
		}
		$user->save();
		
		$rest = new Rest;
		if( $user ){
			$rest->status			= 'success';
			$rest->data['result']	= $user->to_array();
			$rest->message			= 'Account has been updated.';
		}else{
			$rest->status	= 'error';
			$rest->message	= 'There was an error with updating.';
		}
		
		return Response::json($rest);
	}
	
	
	public function get_validate($account, $token){

		$rest = new Rest;
		
		$bool = User::validate_credentials($account, $token);
		
		if( $bool ){
			$rest->status			= 'success';
			$rest->data['result']	= TRUE;
			$rest->message			= 'Login credentials are valid.';
		}else{
			$rest->status			= 'error';
			$rest->data['result']	= FALSE;
			$rest->message			= 'Login credentials are not valid.';
		}
		
		return Response::json($rest);	
	}
	
	
	
	
	/**
	 * Check if user account credentials are valid before proceeding.
	 * 
	 * @param type $account
	 * @param type $token
	 * @return mixed Returns json message and exits on fail. Otherwise (bool) true;
	 */
	private function check_account_and_token($account, $token){
		
		$rest = new Rest;
		
		$bool = User::validate_credentials($account, $token);
		
		if( $bool ){
			return TRUE;
		}else{
			$rest->status			= 'error';
			$rest->data['result']	= FALSE;
			$rest->message			= 'Login credentials are not valid.';
			return Response::json($rest);
			exit;
		}
	}

}//end class Appapi_Api_Controller