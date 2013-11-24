<?php namespace Litmus\Entities;

use Litmus\Roles\SwatchRoles;

class Swatch implements SwatchRole
{
	use \Litmus\Traits\ColorTrait;
	use \Litmus\Traits\VarianceTrait;

	protected $role;

	function __construct()
	{
		$this->role = "Swatch";
		
		return $this;
	}

}