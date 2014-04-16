<?php namespace Litmus\Entities;

use Ambient\Helpers\VectorHelper;

class Vector
{
	public $red;
	public $green;
	public $blue;
	public $alpha;
	
	public function __construct($red, $green, $blue, $alpha = 1)
	{
		$this->red 		= $red;
		$this->green 	= $green;
		$this->blue 	= $blue;
		$this->alpha 	= $alpha;
	}

	public function getNormalVector()
	{
		return VectorHelper::normalize($this);
	}

	public function toArray()
	{
		return array(
				'red' 	=> $this->red,
				'green'	=> $this->green,
				'blue'	=> $this->blue,
				'alpha'	=> $this->alpha,
			);
	}
}