<?php namespace Litmus\Entities;

use Litmus\Entities\Rgba;
use Litmus\Entities\Vector;

interface VarianceInterface
{
	function setVector(Vector $vector);
	function setNormalized($float);
	function setMagnitude($percent);
	function getVector();
	function getNormalized();
	function getMagnitude();
}


/**
	vector => 
		red => -85
		green => 3
		blue => -122
	magnitude => 148.721215702
	normalized => 0.336722485961
 */
class Variance
{
	protected $vector;
	protected $normalized;
	protected $magnitude;

	function setVector(Vector $vector)
	{
		$this->vector = $vector;
		return $this;
	}
	
	function setNormalized($float)
	{
		$this->normalized = $float;
		return $this;
	}

	function setMagnitude($percent)
	{
		$this->magnitude = $percent;
		return $this;
	}

	function getVector()
	{
		return $this->vector;
	}
	
	function getNormalized()
	{
		return $this->normalized;
	}

	function getMagnitude()
	{
		return $this->magnitude;
	}

	function toArray()
	{
		return array(
				'vector' 	=> $this->vector->toArray(),
				'normalized'=> $this->normalized,
				'magnitude'	=> $this->magnitude
			);
	}

}