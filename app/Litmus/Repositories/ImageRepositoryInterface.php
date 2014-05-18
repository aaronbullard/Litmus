<?php namespace Aaronbullard\Litmus\Repositories;

interface ImageRepositoryInterface{
	public function findById($image_id);
	public function save($image);
}