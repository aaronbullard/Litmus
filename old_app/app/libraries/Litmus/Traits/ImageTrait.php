<?php namespace Litmus\Traits;

use Litmus\Entities\Rgba;

interface ImageTraitInterface extends ColorTraitInterface
{
	function loadImage($image_url);
	function getUrl();
}


trait ImageTrait
{
	protected $url;
	protected $image;


	public function loadImage($image_url)
	{
		$this->url   = $image_url;

		$this->createImage()->getAverageColor();

		return $this;
	}


	public function getUrl()
	{
		return $this->url;
	}


	protected function createImage()
	{
		$image_url = $this->url;

		$mime = image_type_to_mime_type( exif_imagetype ( $image_url ) );

		$im;

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
				return NULL;
			break;
		}

		$this->image = $im;

		return $this;
	}


	protected function getAverageColor()
	{
		$im = $this->image;
		
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
				//$a += $rgba['alpha'];
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
					//'alpha'	=> round($a / $total),
				);

		$rgb = new Rgba($avg['red'], $avg['green'], $avg['blue']);
		
		unset($r); unset($g); unset($b); unset($a);

		// return (array)$avg;
		
		$this->setColor($rgb);

		return $this;
	}
}