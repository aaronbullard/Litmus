<?php

use Helpers\Util;
use Litmus\Api\LitmusInterface;
use Illuminate\View\View as ViewObject;

class MockupController extends BaseController{
	
	
	public $restful = true;

	private $upload_path;
	private $image_url;
	private $user;
	private $litmus;
	

	public function __construct(ViewObject $view, User $user, LitmusInterface $litmus)
	{
		$this->user 	= $user;
		$this->litmus 	= $litmus;
		$this->view 	= $view;
		
		$this->upload_path = app_path().'/uploads';
		$this->image_url   = URL::to('colormatch/image');
	}
	
	
	public function get_index()
	{
		$this->view->content = View::make('mockup.partials.uploadform');
		return $this->view;
	}

	
	public function post_image()
	{
		$rules = array(
			'sample' => 'required|image'
		);
		
		//Validate input		
		$validation = Validator::make( Input::all(), $rules );

		if( $validation->fails() ){
			return Redirect::back()->with_errors($validation)->with_input();
		}

		$url = array();
		//save files if exists
		foreach( array('sample', 'control') as $image)
		{		
			// if( File::exists(Input::file($image.'.tmp_name')) ){
			if( Input::hasFile($image) )
			{
				$name		= Input::file($image)->getClientOriginalName();
				$ext		= strtolower( Input::file($image)->getClientOriginalExtension() );
				$url[$image]= $this->image_url.'/'.$image.".".$ext;

				Input::file($image)->move($this->upload_path, $image.".".$ext);
			}
		}//end foreach

		//analyze images submitted
		$litmus = $this->litmus;
	
		if( isset($url['sample']) ){ $litmus->set_sample_url( $url['sample'] ); }
		if( isset($url['control']) ){ $litmus->set_control_url( $url['control'] ); }
		if( Input::has('scale_id') ){ $litmus->set_scale_id( Input::get('scale_id') ); }

		$response = $litmus->analyze();
Util::dump($response);
		if( $response->status == 'error' ){
			echo $response->message;exit;
		}
		
		//recursive function for outputting a heirarchial data tree
		$string = "<ul>".Util::recursiveTree($response)."</ul>";

		$data 				= array();
		$data['title']		= "Image Analysis";
		$data['lead']		= "Response from Litmus API";

		$data['code']		= $string;
		$data['response']	= $response;

		return View::make('mockup.pages.result', $data);
	}


	public function get_image($name){

		$filepath = $this->upload_path.'/'.$name;

		//$mime = image_type_to_mime_type( exif_imagetype ( $filepath ) );
		
		return Response::download($filepath, $name);
	}


	public function get_palettes($id)
	{
		$colors = Palette::find($id)->colors()->get();

		$this->view->title	= "Control Palette";
		$this->view->lead	= "Colors used for control.";
		$this->view->content = View::make('mockup.pages.swatches')->with('colors', $colors)->render();
		
		return $this->view;
	}

	
}