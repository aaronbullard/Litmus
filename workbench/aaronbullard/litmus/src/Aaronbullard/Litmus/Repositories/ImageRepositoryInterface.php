<?php namespace Aaronbullard\Litmus\Repositories;

use Aaronbullard\Litmus\Entities\Image;

interface ImageRepositoryInterface{
	public function findById($image_id);
	public function save(Image $image);
}