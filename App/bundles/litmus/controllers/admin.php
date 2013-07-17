<?php

class Litmus_Admin_Controller extends Base_Controller{
	

	public $restful = true;

	public function get_index(){

		return View::make('litmus::home.home');

	}
	
	public function get_register(){
	
		$form = file_get_contents(URL::to('api/register'));
		
		return View::make('litmus::home.register')->with_form($form);
	}
	

}