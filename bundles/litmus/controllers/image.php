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
	

	public function get_index(){
		return $this->get_view();
	}


	public function post_sample(){

		//Validate account
		$acct	= Input::get('account');
		$token	= Input::get('token');
		
		$validate = User::validate_credentials($acct, $token);
		
		if( !$validate ){
			$json = new Rest;
			$json->status = 'error';
			$json->message = 'Your account credentials failed.';
			return Response::json($json);
		}else{

			$scale		= Input::get('scale');
			$sample		= Input::file('sample');
			$control	= Input::file('control');
			
			//Get average color of sample

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