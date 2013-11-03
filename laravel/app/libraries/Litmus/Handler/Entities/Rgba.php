<?php namespace Litmus\Handler\Entities;

class Rgba
{
	
	public $red;
	public $green;
	public $blue;
	public $alpha;

	
	public function __construct(array $array = array())
	{
		if( !empty($array) )
		{
			foreach($array as $key => $value)
			{
				$this->$key = $value;
			}
		}
	}

	
}