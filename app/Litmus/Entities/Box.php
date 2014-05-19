<?php namespace Litmus\Entities;

class Box{

	public $x1;
	public $y1;
	public $x2;
	public $y2;
	
	public function __construct(array $params)
	{
		$this->x1 = $params[0];
		$this->y1 = $params[1];
		$this->x2 = $params[2];
		$this->y1 = $params[3];

		return $this;
	}

	public static function makeFromJson($json)
	{
		$obj = json_decode($json);
		
		return new static([$obj->x1, $obj->y1, $obj->x2, $obj->y2]);
	}

	public function toJson()
	{
		return json_encode($this);
	}

	public function __toString()
	{
		return $this->toJson();
	}
}