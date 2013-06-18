<?php

class Litmus_Api_Controller extends Base_Controller{
	

	public $restful = true;

	public function get_index(){

		return View::make('litmus::api');

	}

}