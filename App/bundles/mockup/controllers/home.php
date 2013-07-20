<?php

class Mockup_Home_Controller extends Base_Controller{
	

	public $restful = true;
	
	protected $user_table = array();
	

	public function __construct(){

		
	}
	
	
	public function index(){
		$this->get_form();
	}
	
	
	public function get_form(){

		$data = array();

		$data['title']	= "Image Upload";
		$data['lead']	= "Upload your sample image for analysis";
		$data['form']	= file_get_contents('http://localhost:8888/Litmus/App/public/image');
		
		return View::make('litmus::image.upload', $data);
		
	}
	
	

	
}