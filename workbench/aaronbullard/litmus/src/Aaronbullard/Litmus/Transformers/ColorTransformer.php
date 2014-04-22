<?php namespace Aaronbullard\Litmus\Transformers;

use Aaronbullard\Api\Transformer;

class ColorTransformer extends Transformer{

	public function transform($color)
	{
		return [
			'id'			=> (int)$color['id'],
			'name'  		=> $color['name'],
			'palette_id'	=> $color['palette_id']
		];
	}

}