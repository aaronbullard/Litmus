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
		
		$data['table']['fields']  = array( 'id', 'title', 'description', 'created_at');
		$data['table']['objects'] = Scale::where_account( self::LITMUS_ACCOUNT )->get( $data['table']['fields']);
		$data['table']['link_url'] = URL::current();
		
		$data['tabs'][]	= array('All', URL::to('palettes'), 'active');
		$data['tabs'][]	= array('Add', URL::to('palettes/create'));

		$data['content']	= View::make('litmus::partials.table', $data['table'])->render();

		return $this->layout($data);

	}
	
	
	public function get_show($id){

		$data['palette'] = Scale::find($id);
		
		$data['title']	= "Palette '".$data['palette']->title."'";
		$data['lead']	= "Colors associated with this palette.";
		
		$data['palette'] = Scale::find($id);
		
		$data['table']['fields']  = array( 'id', 'name', 'red', 'green', 'blue', 'alpha', 'hex', 'created_at');
		$data['table']['objects'] = $data['palette']->colors($data['table']['fields'])->get();
		$data['table']['link_url'] = URL::current()."/colors";
		
		$data['tabs'][]	= array('All', URL::to('palettes'));
		$data['tabs'][]	= array('Add', URL::to('palettes/create'),'active');
		
		$data['content']	= View::make('litmus::partials.table', $data['table'])->render();

		return $this->layout($data);
		
	}
	
	public function get_create(){
		
		$data = array();
		
		$data['title']		= "Palette";
		$data['lead']		= "Create a palette to organize your colors.";
		
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
		
	}
	
	public function put_update($id){
		
	}
	
	public function delete_destroy($id){
		
	}
	
	
}// end Litmus_Palettes_Controller