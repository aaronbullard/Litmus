<?php namespace Litmus\Api;

// use \Laravel\URL as URL;
use Exception;
use Helpers\Util;
use Litmus\Api\LitmusInterface;

// define LITMUS_URL
require_once('config.php');

class Litmus implements LitmusInterface{
	
	protected $account;
	protected $token;
	protected $data = array(); //array('sample'=>$image_url, 'control'=>$image_url, 'scaleID'=>$integer)
	protected $urls = array();
	
	
	function __construct($account, $token){

		$this->account  = $account;
		$this->token	= $token;
		$this->urls['analysis'] = LITMUS_URL;

	}// end Litmus::__construct()
	
	
	public function set_palette_id($scale_id){
		$this->data['palette_id'] = $scale_id;
		return $this;
	}// end Litmus::set_scale_id
	
	
	public function set_subject_url($subject_url){
		$this->data['subject'] = $ubject_url;
		return $this;
	}// end Litmus::set_sample_url
	
	
	public function set_control_url($control_url){
		$this->data['control'] = $control_url;
		return $this;
	}// end Litmus::set_control_url


	public function get($data = array()){
		
		//handle mass data assignment
		$this->mass_data_assignment($data);
		
		//Check if sample image url has been set
		if( !isset($this->data['subject']) ){
			throw new Exception('The subject image url has not been set.');
		}

		$array				= $this->data;
		$array['account']	= $this->account;
		$array['token']		= $this->token;

		$query = http_build_query($array);

		try{
			$query_url  = $this->urls['analysis'].'?'.$query;
			@$json		= file_get_contents($query_url);
			$response	= json_decode($json);

			if( ! $response ){
				throw new Exception("There was a problem with the query:<br /> ".$query_url);
			}
	
		}catch( Exception $e ){
			
			$rest = (object) 'rest';
			$rest->status 	= 'error';
			$rest->data	  	= NULL;
			$rest->message 	= $e->getMessage();
			
			$response = $rest;
		}

		return $response;
		
	}// end Litmus::analyze()
	
	
	/******************
	 * PROTECTED METHODS
	 *****************/
	
	protected function mass_data_assignment($data = array()){
		
		if( !empty($data) ){
			//set sample
			if( isset($data['subject']) ){
				$this->set_subject_url($data['subject']);
			}
			//set control
			if( isset($data['control']) ){
				$this->set_control_url($data['control']);
			}
			//set scaleID
			if( isset($data['palette_id']) ){
				$this->set_palette_id($data['palette_id']);
			}
		}
		
		return $this;
	}// end Litmus::mass_data_assignment

}// end class Litmus

// end Litmus.php