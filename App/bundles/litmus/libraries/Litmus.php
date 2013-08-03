<?php


interface Litmus_i{
	public function set_scaleID($scaleID);
	public function set_sample_url($image);
	public function set_control_url($image);
	public function analyze($data = array());
}// end interface Litmus_i


class Litmus implements Litmus_i{
	
	protected $account;
	protected $token;
	protected $data = array(); //array('sample'=>$image_url, 'control'=>$image_url, 'scaleID'=>$integer)
	protected $url = array();
	
	
	function __construct($account, $token){
		
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

	}// end Litmus::__construct()
	
	
	public function set_scaleID($scaleID){
		$this->data['scaleID'] = $scaleID;
		return $this;
	}// end Litmus::set_scaleID
	
	
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

			$response = file_get_contents($this->url['analyze'].'?'.$query);

			if( ! $response ){
				throw new Exception("Query was not successful.");
			}
	
		}catch( Exception $e ){
			
			$response = $e->getMessage();
			
		}
		
		return json_decode($response);
		
	}// end Litmus::analyze()
	
	
	/******************
	 * PRIVATE METHODS
	 *****************/
	
	protected function init_urls(){
		
		$this->url = array(
			'validate'	=> URL::to('api/validate'),
			'analyze'	=> URL::to('litmus/analysis'),
		);
		
	}// end Litmus::init_urls()
	
	
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