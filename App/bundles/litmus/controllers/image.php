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
		$account = Input::get('account');
		$token	 = Input::get('token');
		
		$validate = true;//User::validate_credentials($account, $token);
		
		$rest = new Rest;
		
		if( !$validate ){
			
			//Login failed.
			$rest->status = 'error';
			$rest->message = 'Login credentials are not valid.';
			
		}else{
			
			//$scale		= Input::get('scale');
			$sample		= Input::file('sample');
			$control	= Input::has('control') ? Input::file('control') : NULL;

			//Get average color of sample
			$avgClr['sample']	= LitmusHandler::average_color($sample['tmp_name']);
			//$avgClr['control']	= LitmusHandler::average_color($control);
			
			//Get colors from scale
			/**
			 * 
			 * TEMP CODE
			 */
			$scale   = array();
			$scale[] = array('red'=>255, 'green'=>0, 'blue'=>0, 'alpha'=>0);
			$scale[] = array('red'=>0, 'green'=>255, 'blue'=>0, 'alpha'=>0);
			$scale[] = array('red'=>0, 'green'=>0, 'blue'=>255, 'alpha'=>0);
			$scale[] = array('red'=>190, 'green'=>200, 'blue'=>219, 'alpha'=>0);
			
			//Compare color to scale
			$results = array();
			foreach($scale as $index => $color){
				$results[$index]['color'] = $color;
				$results[$index]['difference']['magnitude'] = LitmusHandler::difference($avgClr['sample'], $color);
				$results[$index]['difference']['normalized'] = $results[$index]['difference']['magnitude'] / LitmusHandler::MAX_COLOR_DIFFERENCE;
			}
			
			/*
			 * rank results
			 */

			//return result object
			$rest->status			= 'success';
			$rest->message			= '';
			$rest->data['sample']	= $avgClr['sample'];
			$rest->data['result']	= $results;
		}
		
		return Response::json($rest);
	}
	
	
	
	public function get_view(){
	
		$data = array();
		
		$data['fields'] = Config::get('litmus::config.form.image');
		$form = View::make('litmus::image.form', $data)->render();
		
		return $form;
		
	}

}