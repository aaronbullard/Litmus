<?php namespace Litmus\Entities;

use Litmus\Entities\RemoteImage;
use Litmus\Roles\ControlRole;

class Control extends RemoteImage implements ControlRole
{
	use \Litmus\Traits\ColorTrait;
	use \Litmus\Traits\VarianceTrait;
		
	function __construct( $image_url )
	{
		parent::__construct( $image_url );
		
		return $this;
	}

}