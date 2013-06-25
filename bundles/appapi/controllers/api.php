<?php


class Appapi_Api_Controller extends Base_Controller{
	

	public $restful = true;
	
	protected $user_table = array();
	
	public function __construct(){
		
		foreach( Config::get('appapi::config.register') as $key=>$value){
			$this->user_table[] = $key;
		}
		
	}

	
	public function get_index(){
		echo "hello.";exit;
	}
	
	
	public function get_register(){
		
		return View::make('appapi::register')->with_register(Config::get('appapi::config.register'));
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
			
			$message = "User added successfully!";
			return Redirect::to('api/register')->with('message', $message)->with_input();
			
		}
		
		
	}
	


}