<?php namespace Litmus\Traits;

use Litmus\Entities\Rgba;
use Litmus\Entities\Vector;

interface VarianceTraitInterface
{
	function setVector(Vector $vector);
	function setNormalized($float);
	function setMagnitude($percent);
	function getVector();
	function getNormalized();
	function getMagnitude();
}


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
trait VarianceTrait
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

}