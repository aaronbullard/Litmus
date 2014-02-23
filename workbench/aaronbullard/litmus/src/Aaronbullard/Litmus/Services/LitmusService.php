<?php namespace Aaronbullard\Litmus\Services;

use Exception;
use Aaronbullard\Litmus\Entities\Rgba;
use Aaronbullard\Litmus\Exceptions\ImageNotFoundException;

class LitmusService{
	
	
	const MAX_COLOR_DIFFERENCE			= 441.67295593; //sqrt( pow(255,2) + pow(255,2) + pow(255,2) );
	const MAX_COLOR_DIFFERENCE_ALPHA	= 510; //sqrt( pow(255,2) + pow(255,2) + pow(255,2) + pow(255,2));
	
	public static function getImageFromUrl($image_url)
	{
		try
		{
			$mime = image_type_to_mime_type( exif_imagetype ( $image_url ) );
		}
		catch(Exception $e)
		{
			throw new MimeTypeException($e->getMessage());
		}
		

		//Get image based on mime and set to $im
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
				throw new MimeTypeException("An image of '$mime' mime type is not supported.");
			break;
		}

		return $im;
	}
	
	public static function average_color($image_url){

		$im = self::getImageFromUrl($image_url);
		
		//Begin getting average
		$width	= imagesx($im);
		$height	= imagesy($im);
		
		$total = $r = $g = $b = $a = 0;
		
		for($x = 0; $x < $width; $x++){
		    for($y = 0; $y < $height; $y++){
				
				//get rgba array at index
		    	$index	= imagecolorat($im, $x, $y);
				$rgba	= imagecolorsforindex($im, $index);
				
				//add total for each color
				$r += $rgba['red'];
				$g += $rgba['green'];
				$b += $rgba['blue'];
				$a += $rgba['alpha'];
				$total++;
				
				unset($index);
				unset($rgba);
		    }// end for $y
		}// end for $x
		
		unset($im);
		
		$avg = array(
					'red'	=> round($r / $total),
					'green'	=> round($g / $total),
					'blue'	=> round($b / $total),
					'alpha'	=> round($a / $total),
				);

		$rgba = Rgba::create($avg);
		
		unset($r); unset($g); unset($b); unset($a);

		// return (array)$avg;
		return $rgba;
	}

	
	private static function var_vector(Rgba $rgb1, Rgba $rgb2){
		//get delta between pixels on r, g, b
		$dr = $rgb2->red   - $rgb1->red;
		$dg = $rgb2->green - $rgb1->green;
		$db = $rgb2->blue  - $rgb1->blue;

		$vector = array(
			'red'	=> $dr,
			'green'	=> $dg,
			'blue'	=> $db
		);

		return $vector;
	}	
	

	private static function var_magnitude(array $var_vector){

		$vec		= $var_vector;
		$magnitude	= sqrt( pow($vec['red'], 2) + pow($vec['green'], 2) + pow($vec['blue'], 2) );

		return $magnitude;
	}
	
	
	public static function compare(Rgba $rgb1, Rgba $rgb2){
		
		$data				= array();
		
		$data['color']		= $rgb2;
		$data['vector']		= self::var_vector($rgb1, $rgb2);
		$data['magnitude']	= self::var_magnitude($data['vector']);
		$data['normalized']	= $data['magnitude'] / self::MAX_COLOR_DIFFERENCE;
		
		return $data;
	}

}//end LitmusService.php
