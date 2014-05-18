<?php namespace Aaronbullard\Litmus\Repositories;

use Image;

class EloquentImageRepository implements ImageRepositoryInterface{
	
	protected $image;

	public function __construct(Image $image)
	{
		$this->image = $image;
	}

	public function findById($image_id)
	{
		return $this->image->findOrFail($image_id);
	}

	public function save($image)
	{
		if( ! $image instanceof Image )
		{
			throw new \InvalidArguementException;
		}
		return $image->save();
	}
}