<?php namespace Litmus\Traits;

use Litmus\Entities\Rgba;

/**
 	color => 
		red => 100
		green => 100
		blue => 100
		alpha => 1
		name => rgb(100, 100, 100)
	vector => 
		red => -85
		green => 3
		blue => -122
	magnitude => 148.721215702
	normalized => 0.336722485961
 */
trait ColorTrait
{
	protected $color;

	function setColor(Rgba $color)
	{
		$this->color = $color;
		return $this;
	}

	function getColor()
	{
		return $this->color;
	}

}