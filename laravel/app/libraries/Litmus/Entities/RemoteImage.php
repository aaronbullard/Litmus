<?php namespace Litmus\Entities;

use Litmus\Traits\ImageTrait;

class RemoteImage
{
	use ImageTrait;

	function __construct( $image_url )
	{
		$this->loadImage($image_url);
		
		return $this;
	}

}