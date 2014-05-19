<?php namespace Litmus\Commands;

use Litmus\Repositories\ImageRepositoryInterface;

abstract class AbstractCommand{

	protected $imageRepo;
	protected $image;

	public function __construct(ImageRepositoryInterface $imageRepo)
	{
		$this->imageRepo = $imageRepo;
		return $this;
	}

	public function create($image_id)
	{
		$this->image = $this->imageRepo->findById($image_id);
		return $this;
	}

	abstract function execute();
}