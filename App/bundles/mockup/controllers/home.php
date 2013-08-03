<?php

class Mockup_Home_Controller extends Base_Controller{
	
	
	public $restful = true;
	
	private $upload_path;

	const LITMUS_ACCOUNT	= 'eea0ef13df8d2a60b53d5c4574d6331c';
	const LITMUS_TOKEN		= '47360959dd2a037c3f564a59fe31eadf';
	
	public function __construct() {
		$this->upload_path = path('bundle').'mockup/upload';
	}
	
	public function get_form(){

		$data = array();

		$data['title']	= "Image Upload";
		$data['lead']	= "Upload your sample image for analysis";
		$post_url		= http_build_query( array('url'=> URL::to('mockup/results')) );
		$data['content']= file_get_contents( URL::to('litmus/form').'?'.$post_url);
		
		return View::make('mockup::pages.home', $data);
		
	}
	
	
	public function post_results(){

		/*
		 * NEED TO VALIDATE FORM WITH RULES
		 */
		
		$url		= array();
		$scaleID	= Input::has('scale_id') ? Input::get('scale_id') : NULL;

		//save files if exists
		foreach( array('sample', 'control') as $image){
			if( File::exists(Input::file($image.'.tmp_name')) ){

				$name		= Input::file($image.'.name');
				$ext		= strtolower( File::extension($name) );
				$url[$image]= $this->upload_path.'/'.$image.".".$ext;
				
				Input::upload($image, $this->upload_path, $image.".".$ext);
			}
		}//end foreach

		
		//handle if no control
		$url['control'] = isset( $url['control'] ) ? $url['control'] : $url['sample'];
		
		//analyze images submitted
		$litmus = new Litmus(self::LITMUS_ACCOUNT, self::LITMUS_TOKEN);
	
		$response = $litmus->set_sample_url($url['sample'])
							->set_control_url($url['control'])
							->set_scaleID($scaleID)
							->analyze();
		
		//recursive function for outputting a heirarchial data tree
		function recurseTree($var){
			if(is_array($var) || is_object($var)){
				$out = '<li>';
				foreach($var as $k => $v){
				  if(is_array($v) || is_object($v)){
					$out .= $k." => <ul>".recurseTree($v)."</ul>";
				  }else{
					$out .= $k." => ".$v."<br>";
				  }
				}
				return $out.'</li>';
			}
			return $var;
		}

		$string = '<ul>'.recurseTree($response).'</ul>';

		$data = array();
		$data['title']		= "Image Analysis";
		$data['lead']		= "Response from Litmus API";
		$data['content']	= "<div class='container'><pre><code>".$string."</code></pre></div>";
		
		return View::make('mockup::pages.home', $data);
		
	}
	
}