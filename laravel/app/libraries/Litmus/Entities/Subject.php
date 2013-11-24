<?php namespace Litmus\Entities;

use Litmus\Entities\RemoteImage;
use Litmus\Roles\SubjectRole;

class Subject extends RemoteImage implements SubjectRole
{
	use \Litmus\Traits\ColorTrait;

	function __construct( $image_url )
	{
		parent::__construct( $image_url );
		
		return $this;
	}

}