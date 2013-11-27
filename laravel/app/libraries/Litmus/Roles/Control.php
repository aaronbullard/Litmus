<?php namespace Litmus\Roles;

use Litmus\Traits\ColorTraitInterface;
use Litmus\Traits\ImageTraitInterface;
use Litmus\Traits\VarianceTraitInterface;

class Control implements ColorTraitInterface, ImageTraitInterface, VarianceTraitInterface
{
	use \Litmus\Traits\ColorTrait;
	use \Litmus\Traits\ImageTrait;
	use \Litmus\Traits\VarianceTrait;

	public static $role = 'Control';

	function __construct( $image_url )
	{
		$this->loadImage($image_url);

		return $this;
	}

}