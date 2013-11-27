<?php namespace Litmus\Roles;

use Litmus\Entities\Rgba;
use Litmus\Entities\Vector;

interface SwatchRole
{
	// ColorTraits
	function setColor(Rgba $color);
	function getColor();

	// VarianceTraits
	function setVector(Vector $vector);
	function setNormalized($float);
	function setMagnitude($percent);
	function getVector();
	function getNormalized();
	function getMagnitude();
}