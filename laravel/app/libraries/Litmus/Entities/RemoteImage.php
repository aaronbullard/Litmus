<?php namespace Litmus\Entities;

use Litmus\Traits\ImageTrait;
use Litmus\Traits\ImageTraitInterface;
use Litmus\Traits\ImageTrait;
use Litmus\Traits\ImageTraitInterface;


class RemoteImage implements ImageTraitInterface, ColorTraitInterface
{
	use ColorTrait;
	use ImageTrait;

	function __construct( $image_url )
	{
		$this->loadImage($image_url);
		
		return $this;
	}

}