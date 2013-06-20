<?php

class Appapi_Api_Controller extends Base_Controller{
	

	public $restful = true;

	public function get_index(){

	}


	public function get_register(){

		return View::make('appapi::register');

	}


	public function post_register(){
		
		//Create token

		return ''

	}

}