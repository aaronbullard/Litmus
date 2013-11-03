<?php

class Color extends Eloquent {

	public static $palette_id;

	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'red' => 'required',
		'green' => 'required',
		'blue' => 'required',
		'hex' => '',
		'palette_id' => 'required'
	);

	public function palette(){
		return $this->belongsTo('Palette');
	}
	
	
	public function account(){
		return $this->belongsTo('User');
	}

}
