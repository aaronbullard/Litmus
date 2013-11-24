<?php namespace Litmus\Roles;

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