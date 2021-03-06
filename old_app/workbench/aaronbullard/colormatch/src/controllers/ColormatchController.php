<?php

use Illuminate\View\View as ViewObject;

class ColormatchController extends BaseController{
	
	
	public $restful = true;

	private $upload_path;
	private $image_url;
	private $user;
	private $litmus;

	public function __construct(ViewObject $view)
	{
		$this->view 	= $view;
		
		$this->upload_path = app_path().'/uploads';
		$this->image_url   = URL::to('colormatch/image');
	}
	

	public function get_index()
	{
		return $this->view;
	}


	public function post_upload()
	{
		$path = Input::hasFile('subject');
		return Response::json( $path ? "true" : "false" );
		// return View::make('mobile.pages.index')->nest('main', $path )->with('id', 'results');

		$rules = array(
			'subject' => 'required|image'
		);

		//Validate input		
		$validation = Validator::make( Input::all(), $rules );

		if( $validation->fails() ){
			return Redirect::back()->with_errors($validation)->with_input();
		}

		$url = array();
		//save files if exists
		foreach( array('subject') as $image)
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
	
		if( isset($url['subject']) ){ $litmus->set_subject_url( $url['subject'] ); }
		if( Input::has('palette_id') ){ $litmus->set_palette_id( Input::get('palette_id') ); }

		$response = $litmus->get();

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


	public function get_image($name)
	{

		$filepath = $this->upload_path.'/'.$name;

		//$mime = image_type_to_mime_type( exif_imagetype ( $filepath ) );
		
		return Response::download($filepath, $name);
	}


	public function get_palettes($id)
	{
		$colors = Palette::find($id)->colors()->get();
		return $this->view->nest('main', 'mockup.pages.swatches', compact('colors'));
	}

	public function get_test()
	{
		$test = new \Litmus\Tests\LitmusTest();

		// Controls
		$remoteImages = $test->getControls();
		$controls = array();
		foreach($remoteImages as $remote)
		{
			$controls[] = $remote->getRgba();
		}

		// Actuals
		$remoteImages = $test->getActuals();
		$actuals = array();
		foreach($remoteImages as $remote)
		{
			$actuals[] = $remote->getRgba();
		}

		return View::make('mobile.pages.test')->with('controls', $controls)->with('actuals', $actuals);
	}

	public function get_test2()
	{

		$img 		= Litmus\Entities\RemoteImage::create(URL::to('colormatch/image/sample.jpg'));
		$controls 	= $actuals = array( $img->getRgba() );
		return View::make('mobile.pages.test')->with('controls', $controls)->with('actuals', $actuals);
	}

	public function get_signup()
	{
		return View::make('users.create');
	}

	public function post_signup()
	{
		return View::make('users.create');
	}
	
}