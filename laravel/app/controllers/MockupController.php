<?php

use Helpers\Util;
use Litmus\Api\LitmusInterface;

class MockupController extends BaseController{
	
	
	public $restful = true;

	private $upload_path;
	private $image_url;
	private $user;
	private $litmus;
	

	public function __construct(Illuminate\View\View $view, User $user, LitmusInterface $litmus) {

		$this->user 	= $user;
		$this->litmus 	= $litmus;
		$this->view 	= $view;
		
		// $this->upload_path = path('bundle').'mockup/upload';
		// $this->image_url   = URL::to('mockup/image');
		
		// Define main assets
		// Asset::container('styles')->add('style', 'bundles/litmus/assets/amelia/bootstrap.min.css');

	}
	
	
	public function get_index()
	{
		$this->view->content = View::make('mockup.partials.uploadform');
		return $this->view;
	}


	public function get_image($name){

		$filepath = $this->upload_path.'/'.$name;

		//$mime = image_type_to_mime_type( exif_imagetype ( $filepath ) );
		
		return Response::download($filepath, $name);
	}
	
	public function post_store(){

		$rules = array(
			'sample' => 'required|image'
		);
		
		//Validate input		
		$validation = Validator::make( Input::all(), $rules );

		if( $validation->fails() ){
			return Redirect::back()->with_errors($validation)->with_input();
		}

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
		$litmus = $this->litmus;
	
		if( isset($url['sample']) ){ $litmus->set_sample_url( $url['sample'] ); }
		if( isset($url['control']) ){ $litmus->set_control_url( $url['control'] ); }
		if( Input::has('scale_id') ){ $litmus->set_scale_id( Input::get('scale_id') ); }

		$response = $litmus->analyze();

		if( $response->status == 'error' ){
			echo $response->message;exit;
		}
		
		//recursive function for outputting a heirarchial data tree
		$string = "<ul>".Util::recursiveTree($response)."</ul>";

		$data = array();
		$data['title']		= "Image Analysis";
		$data['lead']		= "Response from Litmus API";
		$tabs				= array(array('Swatch', '#swatch', 'active'),
									array('Code', '#code')
									);
		$data['tabs']		= View::make('mockup::partials.tabs')->with('tabs', $tabs)->render();
		
		$data['code']		= $string;
		$data['response']	= $response;

		Asset::container('scripts')->add('colorbox', 'bundles/mockup/assets/js/colorbox.js');
		
		return View::make('mockup::pages.result', $data);
		
	}
	
}