<?php namespace Litmus\Roles;

use Litmus\Entities\Rgba;
use Litmus\Entities\Vector;

interface ControlRole
{
	function __construct( $image_url );

	// ColorTraits
	function setColor(Rgba $color);
	function getColor();

	// ImageTraits
	function loadImage($image_url);
	function getUrl();

	// VarianceTraits
	function setVector(Vector $vector);
	function setNormalized($float);
	function setMagnitude($percent);
	function getVector();
	function getNormalized();
	function getMagnitude();
}