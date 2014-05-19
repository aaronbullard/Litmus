<?php namespace Litmus\Services;

use Litmus\Entities\Box;

class LitmusServiceHandler implements LitmusServiceHandlerInterface{
	
	protected $rgba;

	public function setParams($image_path, Box $box = NULL)
	{
		if( isset($box) )
		{
			$this->rgba = LitmusService::getAverageColor($image_path, $box->x1, $box->y1, $box->x2, $box->y2);
		}
		else
		{
			$this->rgba = LitmusService::getAverageColor($image_path);
		}
		
		return $this;
	}

	public function getRgba()
	{
		return $this->rgba;
	}

}