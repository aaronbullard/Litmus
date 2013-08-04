<?php

class Mockup_Home_Controller extends Base_Controller{
	
	
	public $restful = true;
	
	private $upload_path;
	private $image_url;

	const LITMUS_ACCOUNT	= 'eea0ef13df8d2a60b53d5c4574d6331c';
	const LITMUS_TOKEN		= '47360959dd2a037c3f564a59fe31eadf';
	
	public function __construct() {
		$this->upload_path = path('bundle').'mockup/upload';
		$this->image_url   = URL::to('mockup/image');
	}
	
	
	public function get_image($name){

		$filepath = $this->upload_path.'/'.$name;

		$mime = mime_content_type($filepath);
		
		$file_contents = File::get($filepath);

		header("Content-type: {$mime}");

		header("Content-Disposition: attachment; filename='{$name}'");
		
		return $file_contents;
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
		//save files if exists
		foreach( array('sample', 'control') as $image){
			if( File::exists(Input::file($image.'.tmp_name')) ){

				$name		= Input::file($image.'.name');
				$ext		= strtolower( File::extension($name) );
				$url[$image]= $this->upload_path.'/'.$image.".".$ext;
				$url[$image]= $this->image_url.'/'.$image.".".$ext;
				
				Input::upload($image, $this->upload_path, $image.".".$ext);
			}
		}//end foreach

		
		//analyze images submitted
		$litmus = new Litmus(self::LITMUS_ACCOUNT, self::LITMUS_TOKEN);
	
		if( isset($url['sample']) ){ $litmus->set_sample_url( $url['sample'] ); }
		if( isset($url['control']) ){ $litmus->set_control_url( $url['control'] ); }
		if( Input::has('scale_id') ){ $litmus->set_scale_id( Input::get('scale_id') ); }
		
		$response = $litmus->analyze();
		
		//recursive function for outputting a heirarchial data tree
		$string = "<ul>".Mockup\Util::recursiveTree($response)."</ul>";

		$data = array();
		$data['title']		= "Image Analysis";
		$data['lead']		= "Response from Litmus API";
		$tabs				= array(array('Swatch', '#swatch', 'active'),
									array('Code', '#code')
									);
		
		$data['tabs']		= View::make('mockup::partials.tabs')->with('tabs', $tabs)->render();
		
		$data['code']		= $string;
		$data['response']	= $response;

		return View::make('mockup::pages.result', $data);
		
	}
	
}