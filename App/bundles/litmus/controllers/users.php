<?php

class Litmus_Users_Controller extends Base_Controller{
	

	public $restful = true;

	
	public function layout($data = array()){
		return View::make('litmus::palettes.page', $data)->render();
	}
	
	
	public function get_index(){
		
		$data = array();
		
		$data['title']	= "Users Page";
		$data['lead']	= "List of all registered users.";
		
		$data['tabs'][]	= array('All', URL::to('litmus/users'), 'active');
		$data['tabs'][]	= array('Add', URL::to('litmus/users/create'));
		
		$data['table']['objects'] = User::all(); //   DEVELOPMENT!!!!!!!!!!!!!

		$data['content']	= View::make('litmus::partials.table', $data['table'])->render();

		return $this->layout($data);
	}
	
	public function get_create(){
	
		$data = array();
		
		$data['title']		= "Registration Page";
		$data['lead']		= "Sign up for a Litmus Account";
		
		$data['tabs'][]	= array('All', URL::to('litmus/users'));
		$data['tabs'][]	= array('Add', URL::to('litmus/users/create'), 'active');
		
		//$data['content'] = file_get_contents(URL::to('api/register'));
		$fields = Config::get('litmus::config.form.user');
		unset($fields[8]);
		unset($fields[9]);
		
		$data['content'] = View::make('litmus::partials.form')
					->with('fields', $fields)
					->with('url', URL::to('litmus/users'))->render();
		
		return $this->layout($data);
	}
	
	
	/*
	 * Create a user.
	 */
	public function post_store(){

		$data = array();
		
		/*
		foreach( $this->user_table as $field ){
		
			$data[$field] = Input::get( $field );
		}
		*/
		
		$data = Input::all();
		
		//Validate input		
		$validation = User::validate( $data );

		if( $validation->fails() ){

			return Redirect::back()->with_errors($validation)->with_input();
			
		}else{
			
			//Save user
			$user = User::create( $data );
			
			//Generate Account and Token
			$user->generate_account_hash( Config::get('litmus::config.private_key') );
			$user->save();
			
			/**
			 * Email Account and Token to new user
			 */

			$status = "User added successfully!  Login credentials have been sent to: '{$user->email}'.";
			
			return Redirect::back()->with('status', $status);
		}
	}
	
	
	public function get_show($id){

		$data['object'] = User::with('palettes')->find($id);
		
		if( ! $data['object'] ){
			return Redirect::error(404);
		}
		
		$data['title']	= "User '".$data['object']->firstname." ".$data['object']->lastname."'";
		$data['lead']	= "View user details";
		
		$data['tabs'][]	= array('All', URL::to('litmus/users'));
		$data['tabs'][]	= array('View', URL::to('litmus/users/'.$id), 'active');
		$data['tabs'][]	= array('Edit', URL::to('litmus/users/'.$id.'/edit'));
		
		$data['show']['object'] = $data['object'];

		$data['content'] = View::make('litmus::partials.show', $data['show'])->render();

		return $this->layout($data);	
	}

	public function get_palettes($user_id){

		$data['title']	= "Palettes Page";
		$data['lead']	= "Your registered palettes.";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes'), 'active');
		$data['tabs'][]	= array('Add', URL::to('litmus/palettes/create'));
		
		$data['table']['objects'] = Palette::where('user_id', '=', $user_id)->get(); //   DEVELOPMENT!!!!!!!!!!!!!

		$data['content']	= View::make('litmus::partials.table', $data['table'])->render();

		return $this->layout($data);	
	}
	
	
	
}