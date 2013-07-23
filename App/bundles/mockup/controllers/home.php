<?php

class Mockup_Home_Controller extends Base_Controller{
	

	public $restful = true;
	
	const LITMUS_ACCOUNT	= 'eea0ef13df8d2a60b53d5c4574d6331c';
	const LITMUS_TOKEN		= '47360959dd2a037c3f564a59fe31eadf';
	
	
	public function get_form(){

		$data = array();

		$data['title']	= "Image Upload";
		$data['lead']	= "Upload your sample image for analysis";
		$post_url		= http_build_query( array('url'=> URL::to('mockup/form')) );
		$data['form']	= file_get_contents( URL::to('image/form').'?'.$post_url);
		
		return View::make('litmus::image.upload', $data);
		
	}
	
	
	public function post_form(){
		
		$scaleID	= Input::get('scale_id');
		$sample		= Input::file('sample');
		$control	= Input::has('control') ? Input::file('control') : NULL;
			
		$sample_url = $sample['tmp_name'];
		$control_url= $control['tmp_name'];
		
		$litmus = new Litmus(self::LITMUS_ACCOUNT, self::LITMUS_TOKEN);
		
		$response = $litmus->set_sample_url($sample_url)->set_scaleID($scaleID)->analyze();
		
		$data = array();
		$data['title']	= "Image Analysis";
		$data['lead']	= "Response from litmus/image/anaysis";
		$data['code']	= "<div class='container'><pre>".json_encode($response)."</pre></div>";
		
		return View::make('mockup::code', $data);
		
	}
	
	
	
	
	

	
}