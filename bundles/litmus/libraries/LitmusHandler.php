<?php


class LitmusHandler{
	

	public static function average_pixel(array $array){
		//array(4) { ["red"]=> int(255) ["green"]=> int(250) ["blue"]=> int(247) ["alpha"]=> int(0) }

		$total 	= count($array);

		$red 	= array();
		$grn	= array();
		$blu	= array();
		$alp 	= array();

		$r = 0;
		$g = 0;
		$b = 0;
		$a = 0;

		foreach( $array as $rgb ){
			//make separate arrays
			$red[] 	= $rgb['red'];
			$grn[] 	= $rgb['green'];
			$blu[] 	= $rgb['blue'];
			$alp[] 	= $rgb['alpha'];

			//add total for each color
			$r += $rgb['red'];
			$g += $rgb['green'];
			$b += $rgb['blue'];
			$a += $rgb['alpha'];
		}

		$avg = array(
					'red'	=> $r / $count,
					'green'	=> $g / $count,
					'blue'	=> $b / $count,
					'alpha'	=> $a / $count,
				);

		return (array)$avg;

	}



	public static function difference(array $rgb1, array $rgb2){

		//get delta between pixels on r, g, b
		$dr = $rgb2['red'] - $rgb1['red'];
		$dg = $rgb2['green'] - $rgb1['green'];
		$db = $rgb2['blue'] - $rgb1['blue'];

		$magnitude = sqrt( pow($dr, 2) + pow($dg, 2) + pow($db, 2) );

		return $magnitude;

	}


}//end LitmusHandler.php
