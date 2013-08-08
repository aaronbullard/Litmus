<?php

class Litmus_Admin_Controller extends Base_Controller{
	

	public $restful = true;

	
	public function get_index(){
		
		$data = array();
		
		$data['title']		= "Admin Page";
		$data['lead']		= "";
		
		$data['content'] = "Make your admin page";
		
		return View::make('litmus::admin.page', $data);

	}
	
	public function get_register(){
	
		$data = array();
		
		$data['title']		= "Registration Page";
		$data['lead']		= "Sign up for a Litmus Account";
		
		$data['content'] = file_get_contents(URL::to('api/register'));
		
		return View::make('litmus::admin.page', $data);
	}
	
	
	public function get_palette(){
		
		$data = array();
		
		$data['title']		= "Palette";
		$data['lead']		= "Create a palette to organize your colors.";
		
		$data['fields']		= Config::get('litmus::config.form.palette');
		$data['content']	= View::make('litmus::partials.form', $data)->render();
		
		
		return View::make('litmus::admin.page', $data);
		
	}
	
	
	public function post_palette(){
		
		if( ! Input::has('title') ){
			return Redirect::back()->with('error', "You need a title!")->with_input(); //Need to send errors back...
		}
		
		$input = Input::all();
		$input['account'] = 'eea0ef13df8d2a60b53d5c4574d6331c';
		
		try{
			
			$scale	= Scale::create( $input );
			
		}catch(Exception $e){
			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
		
		
		if( $scale ){
			return Redirect::back()->with('status', 'Your palette was submitted successfully!')->with_input();
		}
		
	}
	
	
	public function get_palette_by_id($scale_id){

		$scale = Scale::find($scale_id);
		//only(array('id', 'title', 'description', 'created_at'))->
		$data = array();
		
		$data['header'] = array( 'Id', 'Title', 'Description', 'Created');
		
		$data['rows'] = $scale->to_array();
		unset($data['rows']['updated_at']);
		unset($data['rows']['account']);

		//$data['title']		= "Palettes";
		//$data['lead']		= "Your registered palettes.";
		
		$data['content']	= View::make('litmus::partials.table', $data)->render();
		return $data['content'];
		return View::make('litmus::admin.page', $data);
		
	}
	
}