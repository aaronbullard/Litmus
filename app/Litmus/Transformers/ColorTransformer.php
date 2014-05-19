<?php namespace Litmus\Transformers;

use Aaronbullard\Api\Transformer;

class ColorTransformer extends Transformer{

	public function transform($color)
	{
		return [
			'id'			=> (int)$color['id'],
			'name'  		=> $color['name'],
			'red'			=> $color['red'],
			'green'			=> $color['green'],
			'blue'			=> $color['blue'],
			'palette_id'	=> $color['palette_id']
		];
	}

}