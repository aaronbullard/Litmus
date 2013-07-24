<?php

class Litmus_Admin_Controller extends Base_Controller{
	

	public $restful = true;

	public function get_index(){

		$data['content'] = "Make your admin page";
		
		return View::make('litmus::admin.page', $data);

	}
	
	public function get_register(){
	
		$data['content'] = file_get_contents(URL::to('api/register'));
		
		return View::make('litmus::admin.page', $data);
	}
	
}