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
		
		//$data['content'] = file_get_contents(URL::to('api/register'));
		$fields = Config::get('litmus::config.form.user');
		$data['content'] = View::make('litmus::partials.form')->with('fields', $fields)->render();
		
		return View::make('litmus::admin.page', $data);
	}
	

	
}