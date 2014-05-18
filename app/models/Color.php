<?php

use Litmus\Entities\Rgba;
use Litmus\Contexts\CreateVarianceCtx;

class Color extends AbstractModel {

	public static $palette_id;

	protected $variance;

	protected $guarded = array();
	protected $hidden  = array();

	public static $rules = array(
		'name' 		=> 'required|min:3',
		'red' 		=> 'required|between:0,255|integer',
		'green' 	=> 'required|between:0,255|integer',
		'blue' 		=> 'required|between:0,255|integer',
		'palette_id' => 'required|exists:palettes,id'
	);

	public function palette()
	{
		return $this->belongsTo('Palette');
	}

}
