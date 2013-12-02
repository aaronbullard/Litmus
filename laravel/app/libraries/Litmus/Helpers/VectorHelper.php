<?php namespace Litmus\Helpers;

use Litmus\Entities\Vector;

class VectorHelper
{

	public static function dotProduct(Vector $one, Vector $two)
	{
		$dot = 0;
		foreach(array('red', 'green', 'blue') as $clr)
		{
			$dot += $one->$clr * $two->$clr;
		}
		return (float) $dot;
	}

	public static function crossProduct(Vector $one, Vector $two)
	{
		$vR 		= 	new Vector();
		$vR->red 	=   ( ($one->green * $two->blue) - ($one->blue * $two->green) );
		$vR->green 	= - ( ($one->red * $two->blue) - ($one->blue * $two->red) );
		$vR->blue 	=   ( ($one->red * $two->green) - ($one->green * $two->red) );

		return $vR;
	}

	/**
	 * Normalize a vector by dividing each property (x,y,z) by the magnitude (Hypotenuse).
	 * 	
	 * @param  Vector $one Vector with properties of red, green, blue
	 * @return Vector      Returns Vector object with red, green, blue components between 0 and 1.
	 */
	public static function normalize(Vector $one) {
		$vR 	= new Vector();
		$fMag 	= sqrt( (pow($one->red, 2)) +
						(pow($one->green, 2)) +
						(pow($one->blue, 2))
					);

		$vR->red = $one->red / $fMag;
		$vR->green = $one->green / $fMag;
		$vR->blue = $one->blue / $fMag;

		return $vR;
	}

}