<?php

use Litmus\Entities\Rgba;
use Litmus\Contexts\CreateVarianceCtx;

class Color extends Eloquent {

	public static $palette_id;

	protected $variance;

	protected $guarded = array();
	protected $hidden  = array('id', 'palette_id');

	public static $rules = array(
		'name' 		=> 'required|min:3',
		'red' 		=> 'required|between:0,255|integer',
		'green' 	=> 'required|between:0,255|integer',
		'blue' 		=> 'required|between:0,255|integer',
		'hex' 		=> '',
		'palette_id' => 'required|exists:palettes,id'
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
		$array 	= parent::toArray();

		if( isset($this->variance) )
		{
			$array['variance']	= $this->variance->toArray();	
		}
		
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

	public function getVariance()
	{
		return $this->variance;
	}

	/**
	 * Compares this color's Rgba object to another Rgba object and returns
	 * a Variance object.
	 * 
	 * @param  Rgba 		$rgba Rgba object to compare this colors Rgba object to.
	 * @return Variance 	Returns Variance object.
	 */
	public function compareTo(Rgba $rgba)
	{
		$this->variance = CreateVarianceCtx::create($this->getRgba(), $rgba)->execute();
		
		return $this;
	}

}
