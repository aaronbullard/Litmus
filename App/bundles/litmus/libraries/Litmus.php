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
		
		//Initialize urls
		$this->init_urls();
		
		//Check if account and token were passed
		if( !isset($account) || !isset($token) ){
			throw new Exception("Class Litmus requires an account and token for initialization.");
		}
		
		//Validate account
		$json = $this->validate_account($account, $token);
		if( !$json->data->result ){
			throw new Exception($json->message);
		}else{
			$this->account  = $account;
			$this->token	= $token;
		}
		
	}
	
	
	public function set_scaleID($scaleID){
		$this->data['scaleID'] = $scaleID;
		return $this;
	}
	
	public function set_sample_url($sample_url){
		$this->data['sample'] = $sample_url;
		return $this;
	}
	
	public function set_control_url($control_url){
		$this->data['control'] = $control_url;
		return $this;
	}




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
		
		$response = file_get_contents($this->url['analyze'].'?'.$query);
		
		return json_decode($response);
		
	}
	
	
	/**
	 * PRIVATE METHODS
	 */
	
	private function init_urls(){
		
		$this->url = array(
			'validate'	=> URL::to('api/validate'),
			'analyze'	=> URL::to('litmus/analysis'),
		);
		
	}
	
	private function validate_account($account, $token){
		
		$filename = $this->url['validate'].'/'.$account.'/'.$token;
		
		$json = file_get_contents($filename);
		
		return json_decode($json);
		
	}
	
	
	private function mass_data_assignment($data = array()){
		
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
	}

}