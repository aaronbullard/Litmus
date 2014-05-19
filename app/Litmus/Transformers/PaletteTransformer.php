<?php namespace Litmus\Transformers;

use Palette;
use Aaronbullard\Api\Transformer;

class PaletteTransformer extends Transformer{

	public function transform($palette)
	{
		return $this->transformPalette($palette);
	}

	private function transformPalette(Palette $palette)
	{
		return [
			'id'			=> (int)$palette->id,
			'title'  		=> $palette->title,
			'description'	=> $palette->description
		];

	}

}