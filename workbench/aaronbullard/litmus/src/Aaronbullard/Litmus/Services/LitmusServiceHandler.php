<?php namespace Aaronbullard\Litmus\Services;

class LitmusServiceHandler{
	
	protected $rgba;

	public function setParams($image_path, $x1 = 0, $y1 = 0, $x2 = NULL, $y2 = NULL)
	{
		$this->rgba = LitmusService::getAverageColor($image_url, $x1 = 0, $y1 = 0, $x2 = NULL, $y2 = NULL);

		return $this;
	}

	public function getRgba()
	{
		return $this->rgba;
	}

}