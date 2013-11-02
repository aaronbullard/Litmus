<?php

class Color extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'red' => 'required',
		'green' => 'required',
		'blue' => 'required',
		'hex' => 'required',
		'palette_id' => 'required'
	);
}
