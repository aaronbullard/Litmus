<?php namespace Litmus\Contexts;

use Litmus\Entities\Rgba;
use Litmus\Entities\Vector;
use Litmus\Entities\Variance;
use Litmus\Strategies\Ambient;

class GetAmbientVarianceCtx extends Context
{
	protected $subject;
	protected $controls;
	protected $actuals;
	protected $algorithm;
	protected $variances 	= array();
	protected $rgbas 		= array();

	protected function __construct(Rgba $subject, Palette $controls, Palette $actuals, AmbientInterface $algorithm)
	{
		$this->subject 	= $subject;
		$this->controls = $controls;
		$this->actuals 	= $actuals;
		$this->algorithm = $alroithm;

		$this->createVariances($this->controls, $this->actuals);
	}

	public static function create(Rgba $subject, Palette $controls, Palette $actuals, AmbientInterface $algorithm)
	{
		return new GetAmbientVarianceCtx($subject, $controls, $actuals, $algorithm);
	}

	protected function createVariances(Palette $palette_1, Palette $palette_2)
	{
		$colors_1 = $palette_1->colors()->get();
		$colors_2 = $palette_2->colors()->get();

		// Does each palette contain the same number of colors
		if( count($colors_1) !== count($colors_2) )
		{
			trigger_error(__CLASS__." requires both Palette objects to contain the same number of colors", E_USER_WARNING);
		}

		// Loop through palettes and compare each colors based on a matching index
		for($i=0; $i < count($colors_1); $i++)
		{
			$this->variances[$i] 	= $colors_1[$i]->compareTo( $colors_2[$i] )->getVariance();
			$this->rgbas[$i] 		= $colors_1[$i]->getRgba();
		}

		return $this;
	}

	/**
	 * Returns the Ambient object.  Provides methods for getAmbientVariance() and getAmbientSubject().
	 * 
	 * @return Ambient Returns object with adjusted ambient variance for the subject Rgba.
	 */
	public function execute()
	{
		return $this->algorithm->create($this->subject, $this->rgbas, $this->variances);
	}
}