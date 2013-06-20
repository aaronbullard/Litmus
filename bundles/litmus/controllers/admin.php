<?php

class Litmus_Admin_Controller extends Base_Controller{
	

	public $restful = true;

	public function get_index(){

		return View::make('litmus::home.home');

	}

}