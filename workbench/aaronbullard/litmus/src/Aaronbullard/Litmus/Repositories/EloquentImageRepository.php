<?php namespace Aaronbullard\Litmus\Repositories;

use Image;

class EloquentImageRepository{
	
	public function findById($image_id)
	{
		return Image::findOrFail($image_id);
	}

	public function save(Image $image)
	{
		return $this->image->save();
	}
}