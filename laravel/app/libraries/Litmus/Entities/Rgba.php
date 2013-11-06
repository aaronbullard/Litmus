<?php namespace Litmus\Entities;

class Rgba
{
	
	public $red;
	public $green;
	public $blue;
	public $alpha;
	public $name;
	
	public function __construct($red, $green, $blue, $alpha = 1, $name = NULL)
	{
		$this->red 		= $red;
		$this->green 	= $green;
		$this->blue 	= $blue;
		$this->alpha 	= $alpha;
		$this->name 	= $name;
	}

	
}