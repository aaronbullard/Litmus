<?php namespace Aaronbullard\Litmus\Transformers;

use Aaronbullard\Api\Transformer;

class PaletteTransformer extends Transformer{

	public function transform($palette)
	{
		return [
			'id'			=> (int)$palette['id'],
			'title'  		=> $palette['title'],
			'description'	=> $palette['description']
		];
	}

}