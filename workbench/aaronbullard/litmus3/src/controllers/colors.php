<?php

class ColorsController extends BaseController{
	
	
	public $restful = true;

	public $rules = array();
	
	
	public function __construct() {
		$fields = Config::get('litmus::config.form.color');
		foreach($fields as $field){
			$this->rules[$field['name']] = $field['rule']; 
		}
	}
	
	
	public function layout($data = array()){	
		return View::make('litmus::palettes.page', $data)->render();
	}
	
	
	public function get_index($palette_id){

		$palette = Palette::find($palette_id);
		
		if( ! $palette ){ return Redirect::error(404); }

		$data['title']	= "Colors Page";
		$data['lead']	= "All Colors for Palette '".$palette->title."'.";
		
		$data['tabs'][]	= array('All', URL::current(), 'active');
		$data['tabs'][]	= array('Add', URL::current().'/create');
		
		$data['table']['objects'] = $palette->colors()->get();
		
		foreach( $data['table']['objects'] as $color){
			$color->image = "<div style='background-color:rgb($color->red, $color->green, $color->blue)'>&nbsp</div>";
		}

		$data['content'] = View::make('litmus::partials.table', $data['table'])->render();

		return $this->layout($data);

	}
	
	
	public function get_show($palette_id, $color_id){
		
		$data['object'] = Color::with('palette')->find($color_id);
		
		if( ! $data['object'] ){
			return Redirect::error(404);
		}
		
		$data['title']	= "Color '".$data['object']->name."'";
		$data['lead']	= "Color details";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes/'.$palette_id.'/colors'));
		$data['tabs'][]	= array('View', URL::to('litmus/palettes/'.$palette_id.'/colors/'.$color_id), 'active');
		$data['tabs'][]	= array('Edit', URL::to('litmus/palettes/'.$palette_id.'/colors/'.$color_id.'/edit'));
		
		$data['show']['object'] = $data['object'];

		$data['content']	= View::make('litmus::partials.show', $data['show'])->render();

		return $this->layout($data);
	}
	
	
	public function get_create($palette_id){
	
		$data['title']	= "Create Color";
		$data['lead']	= "Add a color to your palette";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes/'.$palette_id.'/colors'));
		$data['tabs'][]	= array('Add', URL::to('litmus/palettes/'.$palette_id.'/colors/create'), 'active');
		
		$data['url']	= URL::to('litmus/palettes/'.$palette_id.'/colors');
		$data['verb']	= 'POST';
		$data['fields']	= Config::get('litmus::config.form.color');
		$data['content']= View::make('litmus::partials.form', $data)->render();
		
		return $this->layout($data);
	}
	
	
	public function post_store($palette_id){
		
		$input = Input::all();

		$validation = Validator::make($input, $this->rules);
 
		if ($validation->fails()){
			return Redirect::back()->with('errors', $validation->errors)->with_input(); //Need to send errors back...
		}

		try{

			$object = new Color();
			$object = $object->fill( $input );
			$attach = Palette::find($palette_id)->colors()->insert($object);
			
			if( ! $attach ){
				throw new Exception("There was an error inserting the color into palette!");
			}
		}catch(Exception $e){

			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
		
		if( $object->id ){
			return Redirect::to('litmus/palettes/'.$palette_id.'/colors/'.$object->id)
					->with('status', 'Your color was submitted successfully!')->with_input();
		}
	}
	
	
	public function get_edit($palette_id, $color_id){
		
		$data['title']		= "Edit Color";
		$data['lead']		= "Edit your color's details";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes/'.$palette_id.'/colors'));
		$data['tabs'][]	= array('View', URL::to('litmus/palettes/'.$palette_id.'/colors/'.$color_id));
		$data['tabs'][]	= array('Edit', URL::to('litmus/palettes/'.$palette_id.'/colors/'.$color_id.'/edit'), 'active');
		
		$data['object'] = Color::find($color_id);
		
		if( ! $data['object'] ){
			return Redirect::error(404);
		}
		
		$data['url']		= URL::to('litmus/palettes/'.$palette_id.'/colors/'.$color_id);
		$data['verb']		= 'PUT';
		$data['fields']		= Config::get('litmus::config.form.color');
		$data['content']	= View::make('litmus::partials.form', $data)->render();
		
		return $this->layout($data);
	}
	
	
	public function put_update($palette_id, $color_id){
		
		$input = Input::all();

		$validation = Validator::make($input, $this->rules);
 
		if ($validation->fails()){
			return Redirect::back()->with('errors', $validation->errors)->with_input(); //Need to send errors back...
		}
		
		try{
			
			$color = Color::find($color_id);
			$result = $color->fill( $input )->save();
			
		}catch(Exception $e){
			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
		
		if( $result ){
			return Redirect::to('litmus/palettes/'.$palette_id.'/colors')->with('status', 'Your palette was updated successfully!')->with_input();
		}else{
			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
	}
	
	
	public function delete_destroy($palette_id, $color_id){
		
		$delete = Color::find($color_id)->delete();
		
		if( $delete ){
			return Redirect::to('litmus/palettes/'.$palette_id.'/colors')->with('status', 'Your palette was deleted successfully!');
		}else{
			return Redirect::back()->with('error', "There was an error deleting the record!  Please try again.");
		}
	}
	
	
}// end Litmus_Palettes_Controller