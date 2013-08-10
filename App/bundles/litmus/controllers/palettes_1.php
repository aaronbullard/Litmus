<?php


class Litmus_Palettes_Controller extends Base_Controller{
	
	
	public $restful = true;

	
	public function get_index(){
		
		$data = array();
		
		$data['title']		= "Palettes Page";
		$data['lead']		= "";
		
		$data['content'] = "Make your Palettes index page";
		
		return View::make('litmus::admin.page', $data);

	}
	
	
	public function get_show($id){
		
	}
	
	public function get_create(){
		
	}
	
	public function post_store(){
		
	}
	
	public function get_edit($id){
		
	}
	
	public function put_update($id){
		
	}
	
	public function delete_destroy(){
		
	}
	
	
}// end Litmus_Palettes_Controller