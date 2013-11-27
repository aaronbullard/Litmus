<?php namespace Litmus\Roles;

use Litmus\Entities\Rgba;
use Litmus\Entities\Vector;
use Litmus\Traits\ColorTraitInterface;
use Litmus\Traits\VarianceTraitInterface;
use Litmus\Services\LitmusHandler;

class Swatch implements ColorTraitInterface, VarianceTraitInterface
{
	use \Litmus\Traits\ColorTrait;
	use \Litmus\Traits\VarianceTrait;

	public static $role = 'Swatch';

	function __construct()
	{
		return $this;
	}

	public function compareTo(Rgba $rgba)
	{
		$compare = LitmusHandler::compare($rgba, $this->getColor());

		$v = $compare['vector'];
		$vec = new Vector($v['red'], $v['green'], $v['blue']);

		$this->setVector($vec)
			->setMagnitude($compare['magnitude'])
			->setNormalized($compare['normalized']);

		return $this;
	}

}