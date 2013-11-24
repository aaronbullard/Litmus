<?php namespace Litmus\Entities;


class ColorAnalysis extends MagicObject
{
	protected $keys 		= array('image_url', 'color', 'vector', 'magnitude', 'normalized');
	protected $type_casts 	= array('color' => 'Rgba');

	function  __construct($image_url)
	{
		$this->image_url = $image_url;
	}

	protected function getAverageColor()
	{
		$litmus->average_color($sample);
	}
}