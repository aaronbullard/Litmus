<?php


class Litmus_Palettes_Controller extends Base_Controller{
	
	
	public $restful = true;
	
	
	/*THIS IS FOR DEVELOPMENT, IT'S WHAT THE USER WOULD PROVIDE*/
	const LITMUS_ACCOUNT	= 'eea0ef13df8d2a60b53d5c4574d6331c';
	const LITMUS_TOKEN		= '47360959dd2a037c3f564a59fe31eadf';
	

	public function layout($data = array()){
		
		return View::make('litmus::palettes.page', $data)->render();
	}

	
	
	public function get_index(){

		$data['title']	= "Palettes Page";
		$data['lead']	= "Your registered palettes.";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes'), 'active');
		$data['tabs'][]	= array('Add', URL::to('litmus/palettes/create'));
		
		$data['table']['objects'] = Scale::where_account( self::LITMUS_ACCOUNT )->get();

		$data['content']	= View::make('litmus::partials.table', $data['table'])->render();

		return $this->layout($data);

	}
	
	
	public function get_show($id){

		$data['object'] = Scale::find($id);
		
		$data['title']	= "Palette '".$data['object']->title."'";
		$data['lead']	= "View palette details";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes'));
		$data['tabs'][]	= array('Add', URL::to('litmus/palettes/create'));
		$data['tabs'][]	= array('View', URL::to('litmus/palettes/'.$id), 'active');
		$data['tabs'][]	= array('Edit', URL::to('litmus/palettes/'.$id.'/edit'));
		
		$data['show']['object'] = $data['object'];

		$data['content']	= View::make('litmus::partials.show', $data['show'])->render();

		return $this->layout($data);	
	}
	
	
	public function get_create(){
		
		$data = array();
		
		$data['title']		= "Create Palette";
		$data['lead']		= "Create a palette to organize your colors";
		
		$data['tabs'][]		= array('All', URL::to('litmus/palettes') );
		$data['tabs'][]		= array('Add', URL::to('litmus/palettes/create'), 'active');
		
		$data['url']		= URL::to('litmus/palettes/create');
		$data['verb']		= 'PUT';
		$data['fields']		= Config::get('litmus::config.form.palette');
		$data['content']	= View::make('litmus::partials.form', $data)->render();
		
		return $this->layout($data);
		
	}
	
	
	public function post_store(){
		
		if( ! Input::has('title') ){
			return Redirect::back()->with('error', "You need a title!")->with_input(); //Need to send errors back...
		}
		
		$input = Input::all();
		$input['account'] = 'eea0ef13df8d2a60b53d5c4574d6331c';
		
		try{
			
			$scale	= Scale::create( $input );
			
		}catch(Exception $e){
			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
		
		
		if( $scale ){
			return Redirect::back()->with('status', 'Your palette was submitted successfully!')->with_input();
		}
		
	}
	
	
	public function get_edit($id){

		$data['title']		= "Palette";
		$data['lead']		= "Edit your palette's details";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes'));
		$data['tabs'][]	= array('Add', URL::to('litmus/palettes/create'));
		$data['tabs'][]	= array('View', URL::to('litmus/palettes/'.$id));
		$data['tabs'][]	= array('Edit', URL::to('litmus/palettes/'.$id.'/edit'), 'active');
		
		$data['object'] = Scale::find($id);
		
		$data['url']		= URL::to('litmus/palettes/'.$id);
		$data['verb']		= 'PUT';
		$data['fields']		= Config::get('litmus::config.form.palette');
		$data['content']	= View::make('litmus::partials.form', $data)->render();
		
		return $this->layout($data);
		
	}
	
	
	public function put_update($id){
		
		if( ! Input::has('title') ){
			return Redirect::back()->with('error', "You need a title!")->with_input(); //Need to send errors back...
		}
		
		$input = Input::all();
		
		try{
			
			$scale	= Scale::find($id);
			$result = $scale->fill( $input )->save();
			
		}catch(Exception $e){
			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
		
		
		if( $result ){
			return Redirect::to('litmus/palettes/'.$id)->with('status', 'Your palette was updated successfully!')->with_input();
		}else{
			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
		
	}
	
	
	public function delete_destroy($id){
		
	}
	
	
}// end Litmus_Palettes_Controller