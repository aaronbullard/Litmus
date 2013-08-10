<?php


class Litmus_Colors_Controller extends Base_Controller{
	
	
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
	
	
	public function get_index($scale_id){

		$palette = Scale::find($scale_id);
		
		$data['title']	= "Colors Page";
		$data['lead']	= "All Colors for Palette '".$palette->title."'.";
		
		$data['tabs'][]	= array('All', URL::current().'/colors', 'active');
		$data['tabs'][]	= array('Add', URL::current().'/create');
		
		$data['table']['objects'] = $palette->colors()->get();

		$data['content'] = View::make('litmus::partials.table', $data['table'])->render();

		return $this->layout($data);

	}
	
	
	public function get_show($palette_id, $scale_id){
		
		$data['object'] = Scale::find($palette_id)->colors()->where_color_id($scale_id)->first();
		
		$data['title']	= "Color '".$data['object']->name."'";
		$data['lead']	= "Color details";
		
		$data['tabs'][]	= array('All', URL::to('litmus/palettes/'.$palette_id.'/colors'));
		$data['tabs'][]	= array('Add', URL::to('litmus/palettes/create'));
		$data['tabs'][]	= array('View', URL::to('litmus/palettes/'.$palette_id.'/colors/'.$scale_id), 'active');
		$data['tabs'][]	= array('Edit', URL::to('litmus/palettes/'.$palette_id.'/colors/'.$scale_id.'/edit'));
		
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

			$object = Color::create( $input );
			$attach = Scale::find($palette_id)->attach($object);
			if( ! $attach ){
				throw new Exception("There was an error inserting the color into palette!");
			}
		}catch(Exception $e){
			return Redirect::back()->with('error', "There was an error with your submission!  Please try again.")->with_input();
		}
		
		
		if( $object->id ){
			
			return Redirect::to('litmus/palette/'.$palette_id.'/colors/'.$object->id)
					->with('status', 'Your color was submitted successfully!')->with_input();
		}
	}
	
	
	public function get_edit($id){
		
	}
	
	public function put_update($id){
		
	}
	
	public function delete_destroy(){
		
	}
	
	
}// end Litmus_Palettes_Controller