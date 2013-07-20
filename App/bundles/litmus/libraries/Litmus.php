<?php


Interface Litmus_i{

	public function set_sample($image);
	public function set_control($image);
	public function set_scaleID($scaleID);
	
	public function get_analysis($data = array());
}

class Litmus{
	
	private $account;
	private $token;
	
	private $data = array(); //array('sample'=>$image_url, 'control'=>$image_url, 'scaleID'=>$integer)
	
	private $url = array();
	
	public function __construct($account, $token){
		
		//Check if account and token were passed
		if( !isset($account) || !isset($token) ){
			throw new Exception("Class Litmus requires an account and token for initialization.");
		}
		
		//Validate account
		$json = $this->validate_account($account, $token);
		if( !$json->data['results'] ){
			throw new Exception($json->message);
		}
		
		//Initialize urls
		$this->init_urls();
		
	}
	
	
	
	public function analysis($data = array()){
		
		//handle mass data assignment
		$this->mass_data_assignment($data);
		
		/**
		 * USER SUBMITS URL TO IMAGES, THEN API PULLS IMAGE, DOES ANALYSIS
		 */
		
	}
	
	
	/**
	 * PRIVATE METHODS
	 */
	
	private function init_urls(){
		
		$this->url = array(
			'validate'	=> URL::to('appapi/validate'),
			'analyze'	=> URL::to('litmus/sample'),
		);
		
	}
	
	private function validate_account($account, $token){
		
		$filename = $this->url['validate'].'/'.$account.'/'.$token;
		
		$json = file_get_contents($filename);
		
		return $json;
		
	}
	
	
	private function mass_data_assignment($data = array()){
		
		if( !is_empty($data) ){
			//set sample
			if( isset($data['sample']) ){
				$this->set_sample($data['sample']);
			}
			//set control
			if( isset($data['control']) ){
				$this->set_sample($data['control']);
			}
			//set scaleID
			if( isset($data['scaleID']) ){
				$this->set_sample($data['scaleID']);
			}
		}
		
		return $this;
	}

}