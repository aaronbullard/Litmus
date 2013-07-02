<?php

class Litmus_Image_Controller extends Base_Controller{
	

	public $restful = true;
	
	protected $user_table = array();
	
	public function __construct(){
		
		Bundle::start('appapi');
		
		foreach( Config::get('litmus::config.form.image') as $array){
			$this->user_table[] = $array['name'];
		}
		
	}
	
	public function get_index(){}

	public function post_sample(){

		//Validate account
		$acct	= Input::get('account');
		$token	= Input::get('token');
		
		$validate = User::validate_credentials($acct, $token);
		
		if( $validate ){
		
			$scale		= Input::get('scale');
			$sample		= Input::file('sample');
			$control	= Input::file('control');
		}else{
		
			
			
		}
		
		

	}
	
	public function get_view(){
	
		$data = array();
		
		$data['fields'] = Config::get('litmus::config.form.image');
		$data['title']	= "Image Upload";
		$data['lead']	= "Upload your sample image for analysis";
		
		Asset::container('scripts')->add('image','bundles/litmus/js/image_form.js');
		
		$form = View::make('litmus::image.form', $data);
		
		return View::make('litmus::image.upload', $data)->with('form', $form);	
		
	}

}