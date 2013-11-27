<?php namespace Litmus\Roles;

use Litmus\Traits\ColorTraitInterface;
use Litmus\Traits\ImageTraitInterface;

class Subject implements ColorTraitInterface
{
	use \Litmus\Traits\ColorTrait;
	use \Litmus\Traits\ImageTrait;

	public static $role = 'Subject';

	function __construct( $image_url )
	{
		$this->loadImage($image_url);
		
		return $this;
	}

}