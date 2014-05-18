<?php namespace Aaronbullard\Litmus\Transformers;

use Aaronbullard\Api\Transformer;

class ImageTransformer extends Transformer{

	public function transform($image)
	{
		$array 					= $image->toArray();
		$array['rgba_string'] 	= $image->getRgbaString();
		unset($array['path']);

		return $array;
	}

}