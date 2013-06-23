<?php


class Appapi_Api_Controller extends Base_Controller{
	

	public $restful = true;

	public function get_index(){
		echo "hello.";exit;
	}
	
	public function get_register(){
		
		return View::make('appapi::register')->with_register(Config::get('appapi::config.register'));
	}


}