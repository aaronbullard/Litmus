<?php namespace Litmus\Api;

// use \Laravel\URL as URL;
use Helpers\Util;
use Litmus\Api\LitmusInterface;

class Litmus implements LitmusInterface{
	
	protected $account;
	protected $token;
	protected $data = array(); //array('sample'=>$image_url, 'control'=>$image_url, 'scaleID'=>$integer)
	protected $url = array();
	
	
	function __construct($account, $token){
		
		$this->account  = $account;
		$this->token	= $token;

		//Initialize urls
		$this->url['analysis'] = 'http://localhost:8888/litmus/laravel/public/litmus/analysis';
		
		//Check if account and token were passed
		if( !isset($account) || !isset($token) ){
			throw new Exception("Class Litmus requires an account and token for initialization.");
		}
		
	}// end Litmus::__construct()
	
	
	public function set_scale_id($scale_id){
		$this->data['scale_id'] = $scale_id;
		return $this;
	}// end Litmus::set_scale_id
	
	
	public function set_sample_url($sample_url){
		$this->data['sample'] = $sample_url;
		return $this;
	}// end Litmus::set_sample_url
	
	
	public function set_control_url($control_url){
		$this->data['control'] = $control_url;
		return $this;
	}// end Litmus::set_control_url


	public function analyze($data = array()){
		
		//handle mass data assignment
		$this->mass_data_assignment($data);
		
		//Check if sample image url has been set
		if( !isset($this->data['sample']) ){
			throw new Exception('The sample image url has not been set.');
		}

		$array				= $this->data;
		$array['account']	= $this->account;
		$array['token']		= $this->token;

		$query = http_build_query($array);
		
		try{

			$json		= file_get_contents($this->url['analysis'].'?'.$query);
			$response	= json_decode($json);

			if( ! $response ){
				throw new Exception("There was a problem with the query.");
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
	 * PRIVATE METHODS
	 *****************/
	
	// protected function init_urls($base_url){

	// 	$this->url = array(
	// 		'validate'	=> $base_url.'/api/validate',
	// 		'analyze'	=> $base_url.'/litmus/analysis',
	// 	);
		
	// }// end Litmus::init_urls()
	
	
	protected function validate_account($account, $token){
		
		$filename = $this->url['validate'].'/'.$account.'/'.$token;

		$json = file_get_contents($filename);

		return json_decode($json);		
	}// end Litmus::validate_account()
	
	
	protected function mass_data_assignment($data = array()){
		
		if( !empty($data) ){
			//set sample
			if( isset($data['sample']) ){
				$this->set_sample_url($data['sample']);
			}
			//set control
			if( isset($data['control']) ){
				$this->set_control_url($data['control']);
			}
			//set scaleID
			if( isset($data['scaleID']) ){
				$this->set_scaleID($data['scaleID']);
			}
		}
		
		return $this;
	}// end Litmus::mass_data_assignment

}// end class Litmus

// end Litmus.php