<?php

use Litmus\Entities\Rgba;
use Litmus\Contexts\CreateVarianceCtx;

class Color extends Eloquent {

	public static $palette_id;

	protected $variance;

	protected $guarded = array();
	protected $hidden  = array('id', 'palette_id');

	public static $rules = array(
		'name' 		=> 'required',
		'red' 		=> 'required',
		'green' 	=> 'required',
		'blue' 		=> 'required',
		'hex' 		=> '',
		'palette_id' => 'required'
	);

	public function palette()
	{
		return $this->belongsTo('Palette');
	}
	
	
	public function account()
	{
		return $this->belongsTo('User');
	}

	public function toArray()
	{
		$array 				= parent::toArray();
        $array['variance']	= $this->variance->toArray();
        return $array;
	}

	public static function createRgba(Rgba $rgba)
	{
		return new Color($rgba->toArray());
	}

	public function getRgba()
	{
		return new Rgba($this->red, $this->green, $this->blue, $this->alpha, $this->name);
	}

	public function compareTo(Rgba $rgba)
	{
		$this->variance = CreateVarianceCtx::create($this->getRgba(), $rgba)->execute();
		
		return $this;
	}

}
