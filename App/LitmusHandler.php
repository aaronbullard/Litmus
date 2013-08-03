<?php


abstract class LitmusHandler{
	
	
	const MAX_COLOR_DIFFERENCE			= 441.67295593; //sqrt( pow(255,2) + pow(255,2) + pow(255,2) );
	const MAX_COLOR_DIFFERENCE_ALPHA	= 510; //sqrt( pow(255,2) + pow(255,2) + pow(255,2) + pow(255,2));

	
	protected static function get_average_pixel(array $array){
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
					'red'	=> round($r / $total),
					'green'	=> round($g / $total),
					'blue'	=> round($b / $total),
					'alpha'	=> round($a / $total),
				);

		return (array)$avg;

	}

	
	public static function average_color($image_url){
		
		$mime = mime_content_type($image_url);
		
		//Get array of colors
		switch($mime){
			case 'image/jpeg':
				$im = imagecreatefromjpeg($image_url);
			break;
		
			case 'image/gif':
				$im	= imagecreatefromgif($image_url);
			break;
		
			case 'image/png':
				$im	= imagecreatefrompng($image_url);
			break;
			
			case 'image/wbmp':
				$im	= imagecreatefromwbmp($image_url);
			break;
				
			default:
				return "The image type is not supported.";
			break;
		}
		
		$width	= imagesx($im);
		$height	= imagesy($im);

		$rgb = array();
		for($x=0; $x<$width; $x++){
		    for($y=0; $y<$height; $y++){
		    	$index = imagecolorat($im, $x, $y);
				$rgb[] = imagecolorsforindex($im, $index);
		    }
		}

		$avg_clr = self::get_average_pixel($rgb);
		
		return $avg_clr;

	}

	
	public static function var_vector(array $rgb1, array $rgb2){
		//get delta between pixels on r, g, b
		$dr = $rgb2['red'] - $rgb1['red'];
		$dg = $rgb2['green'] - $rgb1['green'];
		$db = $rgb2['blue'] - $rgb1['blue'];

		$vector = array(
			'red'	=> $dr,
			'green'	=> $dg,
			'blue'	=> $db
		);

		return $vector;
	}	
	

	public static function var_magnitude(array $rgb1, array $rgb2){

		$vec		= self::var_vector($rgb1, $rgb2);
		$magnitude	= sqrt( pow($vec['red'], 2) + pow($vec['green'], 2) + pow($vec['blue'], 2) );

		return $magnitude;
	}
	
	
	public static function compare(array $rgb1, array $rgb2){
		
		$data				= array();
		
		$data['color']		= $rgb2;
		$data['vector']		= self::var_vector($rgb1, $rgb2);
		$data['magnitude']	= self::var_magnitude($rgb1, $rgb2);
		$data['normalized']	= $data['magnitude'] / self::MAX_COLOR_DIFFERENCE;
		
		return $data;
	}
	
}//end LitmusHandler.php
