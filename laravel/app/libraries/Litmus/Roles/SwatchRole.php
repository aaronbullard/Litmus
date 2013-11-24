<?php namespace Litmus\Roles;

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