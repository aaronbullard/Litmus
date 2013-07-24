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
	
	
	/**
	 * Route to analyze images and get a JSON result.  This is the main doorway
	 * for clients to submit their images for analysis.
	 * 
	 * @return json
	 */
	public function get_analysis(){

		//Validate account
		$account	= Input::get('account');
		$token		= Input::get('token');
		
		$sample		= Input::get('sample');
		$control	= Input::get('control');
		$scale		= Input::get('scale');
		
		$validate = User::validate_credentials($account, $token);
		
		$rest = new Rest;
		
		if( !$validate ){
			
			//Login failed.
			$rest->status = 'error';
			$rest->message = 'Login credentials are not valid.';
			
		}else{

			//Get average color of sample
			$avgClr['sample']	= LitmusHandler::average_color($sample); //$avgClr['sample']	= LitmusHandler::average_color($sample['tmp_name']);
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
	
	/**
	 * Address for third parties to incorporate an image upload form.
	 * 
	 * @return html
	 */
	public function get_form(){
	
		$data = array();
		
		$data['fields'] = Config::get('litmus::config.form.image');
		
		unset($data['fields'][0]);
		unset($data['fields'][1]);
		
		$data['url']	= Input::has('url') ? Input::get('url') : '';
		$form			= View::make('litmus::partials.form', $data)->render();
		
		return $form;
		
	}

}