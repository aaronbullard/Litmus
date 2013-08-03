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
		
		$validate	= User::validate_credentials($account, $token);
		
		$rest		= new Rest;
		
		if( !$validate ){
			
			//Login failed.
			$rest->status  = 'error';
			$rest->message = 'Login credentials are not valid.';
			
		}else{
			
			try{
				//collect results
				$data = array();

				//Get average color of sample
				$data['sample']['color'] = LitmusHandler::average_color($sample);

				//Get analysis for control
				if( $control ){
					$data['control']['submit']['color']	= LitmusHandler::average_color($control);
					$data['control']['actual']['color']	= array('red'=>0, 'green'=>0, 'blue'=>255);
					$data['control'] = LitmusHandler::compare($data['control']['actual']['color'], $data['control']['submit']['color']);
				}

				//Get colors from scale
				/**
				 * 
				 * TEMP CODE
				 */
				$scale   = array();
				$scale[] = array('red'=>255, 'green'=>0, 'blue'=>0);
				$scale[] = array('red'=>0, 'green'=>255, 'blue'=>0);
				$scale[] = array('red'=>0, 'green'=>0, 'blue'=>255);
				$scale[] = array('red'=>190, 'green'=>200, 'blue'=>219);

				foreach($scale as $color){
					$data['scale'][] = LitmusHandler::compare($data['sample']['color'], $color);
				}


				//return result object
				$time			= date('M d, Y H:i:s');
				$rest->status	= 'success';
				$rest->data		= $data;
				$rest->message	= 'Account: '.$account.' @ '.$time;
			
			}catch(Exception $e){
				
				$rest->status = 'error';
				$rest->message = $e->getMessage();
				
			}// end try/catch
		}//end if/else
		
		return Response::json($rest);
	}// end Litmus_Image_Controller::get_analysis()
	
	
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