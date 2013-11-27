<?php namespace Litmus\Contexts;

use Litmus\Entities\Rgba;
use Litmus\Entities\Vector;
use Litmus\Traits\ColorTraitInterface;
use Litmus\Traits\VarianceTraitInterface;

class SwatchCtx extends Context
{
	const MAX_COLOR_DIFFERENCE			= 441.67295593; //sqrt( pow(255,2) + pow(255,2) + pow(255,2) );
	const MAX_COLOR_DIFFERENCE_ALPHA	= 510; //sqrt( pow(255,2) + pow(255,2) + pow(255,2) + pow(255,2));

	// Roles
	protected $thisSwatch;
	protected $compared_to;

	// Context information
	protected $data = array();


	protected function __construct(VarianceTraitInterface $thisSwatch, ColorTraitInterface $compared_to)
	{
		$this->thisSwatch 	= $thisSwatch;
		$this->compared_to  = $compared_to;

		$this->run();
	}

	public static function compare(VarianceTraitInterface $thisSwatch, ColorTraitInterface $compared_to)
	{
		return new SwatchCtx( $thisSwatch, $compared_to);
	}

	public function get()
	{
		return $this->thisSwatch;
	}

	protected function run()
	{
		// set vector for swatch
		$vector = self::var_vector($this->compared_to->getColor(), $this->thisSwatch->getColor());
		$mag 	= self::var_magnitude($vector);
		$norm 	= self::var_normalized($mag);

		$this->thisSwatch->setVector($vector)
					->setMagnitude($mag)
					->setNormalized($norm);
	}


	private static function var_vector(Rgba $rgb1, Rgba $rgb2){
		//get delta between pixels on r, g, b
		$dr = $rgb2->red   - $rgb1->red;
		$dg = $rgb2->green - $rgb1->green;
		$db = $rgb2->blue  - $rgb1->blue;

		return new Vector($dr, $dg, $db);
	}	
	
	private static function var_magnitude(Vector $vec){

		return sqrt( pow($vec->red, 2) + pow($vec->green, 2) + pow($vec->blue, 2) );
	}
	
	private static function var_normalized($magnitude)
	{
		return $magnitude / self::MAX_COLOR_DIFFERENCE;
	}
}