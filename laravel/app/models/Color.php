<?php

use Litmus\Entities\Rgba;

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

	public function getRgba()
	{
		return new Rgba($this->red, $this->green, $this->blue, $this->alpha, $this->name);
	}

}
