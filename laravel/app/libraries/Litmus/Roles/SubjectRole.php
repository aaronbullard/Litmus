<?php namespace Litmus\Roles;

use Litmus\Entities\Rgba;
use Litmus\Entities\Vector;

interface SubjectRole
{
	function __construct( $image_url );

	// ColorTraits
	function setColor(Rgba $color);
	function getColor();

	// ImageTraits
	function loadImage($image_url);
	function getUrl();
}