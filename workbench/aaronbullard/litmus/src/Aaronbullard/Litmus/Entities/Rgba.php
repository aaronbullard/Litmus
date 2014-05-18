<?php namespace Aaronbullard\Litmus\Entities;

class Rgba{

	public $red;
	public $green;
	public $blue;
	public $alpha;
	
	public function __construct($red, $green, $blue, $alpha = 1)
	{
		$this->red 		= $red;
		$this->green 	= $green;
		$this->blue 	= $blue;
		$this->alpha 	= (int) $alpha;
	}

	public static function create(array $array)
	{
		$array['alpha'] = isset($array['alpha']) ?: (int) 1;
		return new static($array['red'], $array['green'], $array['blue'], $array['alpha']);
	}

	public function toArray()
	{
		return array(
				'red' 	=> $this->red,
				'green'	=> $this->green,
				'blue'	=> $this->blue,
				'alpha'	=> $this->alpha
			);
	}

	public function __toString()
	{
		return json_encode($this->toArray());
	}
}