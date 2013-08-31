<?php


class Litmus_Palettes_Controller extends Base_Controller{
	
	
	public $restful = true;

	public $rules = array();
	
	
	public function __construct() {
		//Run if request is 'POST' or 'PUT'
		$verb = Request::method();
		if ( $verb === 'POST' || $verb === 'PUT' ){
			$fields = Config::get('litmus::config.form.palette');
			foreach($fields as $field){
				$this->rules[$field['name']] = $field['rule']; 
			}
		}
	}
	

	public function layout($data = array()){
		return View::make('litmus::palettes.page', $data)->render();
	}

	
	
	public function get_index(){

		$data['title']	= "Palettes Page";
		$data['lead']	= "Your registered palettes.";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes'), 'active');
		$data['tabs'][]	= array('Add', URL::to('litmus/palettes/create'));
		
		$data['table']['objects'] = Palette::all(); //   DEVELOPMENT!!!!!!!!!!!!!

		$data['content']	= View::make('litmus::partials.table', $data['table'])->render();

		return $this->layout($data);

	}
	
	
	public function get_show($id){

		$data['object'] = Palette::with(array('user', 'colors'))->find($id);
		
		if( ! $data['object'] ){
			return Redirect::error(404);
		}
		
		$data['title']	= "Palette '".$data['object']->title."'";
		$data['lead']	= "View palette details";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes'));
		$data['tabs'][]	= array('View', URL::to('litmus/palettes/'.$id), 'active');
		$data['tabs'][]	= array('Edit', URL::to('litmus/palettes/'.$id.'/edit'));
		
		$data['show']['object'] = $data['object'];

		$data['content'] = View::make('litmus::partials.show', $data['show'])->render();

		return $this->layout($data);	
	}
	
	
	public function get_create(){
		
		$data['title']	= "Create Palette";
		$data['lead']	= "Create a palette to organize your colors";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes') );
		$data['tabs'][]	= array('Add', URL::to('litmus/palettes/create'), 'active');
		
		$data['url']	= URL::to('litmus/palettes');
		$data['verb']	= 'POST';
		$data['fields']	= Config::get('litmus::config.form.palette');
		$data['content']= View::make('litmus::partials.form', $data)->render();
		
		return $this->layout($data);
		
	}
	
	
	public function post_store(){
		
		$input = Input::all();

		$validation = Validator::make($input, $this->rules);
 
		if ($validation->fails()){
			return Redirect::back()->with('errors', $validation->errors)->with_input(); //Need to send errors back...
		}
		
		$input = Input::all();
		$input['user_id'] = 1;  //   DEVELOPMENT!!!!!!!!!!!!!
		
		try{
			
			$palette = Palette::create( $input );
			
		}catch(Exception $e){
			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
		
		
		if( $palette ){
			return Redirect::to('litmus/palettes/'.$palette->id)->with('status', 'Your palette was submitted successfully!');
		}
		
	}
	
	
	public function get_edit($id){

		$data['title']	= "Edit Palette";
		$data['lead']	= "Edit your palette's details";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes'));
		$data['tabs'][]	= array('View', URL::to('litmus/palettes/'.$id));
		$data['tabs'][]	= array('Edit', URL::to('litmus/palettes/'.$id.'/edit'), 'active');
		
		$data['object'] = Palette::find($id);
		
		if( ! $data['object'] ){
			return Redirect::error(404);
		}
		
		$data['url']	= URL::to('litmus/palettes/'.$id);
		$data['verb']	= 'PUT';
		$data['fields']	= Config::get('litmus::config.form.palette');
		$data['content']= View::make('litmus::partials.form', $data)->render();
		
		return $this->layout($data);
		
	}
	
	
	public function put_update($id){
		
		if( ! Input::has('title') ){
			return Redirect::back()->with('error', "You need a title!")->with_input(); //Need to send errors back...
		}
		
		$input = Input::all();
		
		try{
			
			$palette	= Palette::find($id);
			$result		= $palette->fill( $input )->save();
			
		}catch(Exception $e){
			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
		
		if( $result ){
			return Redirect::to('litmus/palettes/'.$id)->with('status', 'Your palette was updated successfully!');
		}else{
			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
		
	}
	
	
	public function delete_destroy($id){
		
		$delete = Palette::find($id)->delete();
		
		if( $delete ){
			return Redirect::to('litmus/palettes')->with('status', 'Your palette was deleted successfully!');
		}else{
			return Redirect::back()->with('error', "There was an error deleting the record!  Please try again.");
		}
		
	}
	
	
}// end Litmus_Palettes_Controller