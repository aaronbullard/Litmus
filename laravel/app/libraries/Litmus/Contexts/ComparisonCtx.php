<?php namespace Litmus\Contexts;

use Litmus\Entities\Vector;

/**
 * Class to compare two colors
 */
class ComparisonCtx extends Context
{
	const MAX_COLOR_DIFFERENCE			= 441.67295593; //sqrt( pow(255,2) + pow(255,2) + pow(255,2) );
	const MAX_COLOR_DIFFERENCE_ALPHA	= 510; //sqrt( pow(255,2) + pow(255,2) + pow(255,2) + pow(255,2));

	// Roles
	protected $subject;
	protected $swatch;

	// Context information
	protected $data = array();


	function __construct(SubjectRole $subject, SwatchRole $other)
	{
		$this->subject = $subject;
		$this->swatch  = $other;

		$this->run();

		return $swatch;
	}


	private function run()
	{
		// set vector for swatch
		$vector = self::var_vector($this->subject->getColor(), $this->swatch->getColor());
		$mag 	= self::var_magnitude($vector);
		$norm 	= self::var_normalized($mag);

		$this->swatch->setVector($vector)
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