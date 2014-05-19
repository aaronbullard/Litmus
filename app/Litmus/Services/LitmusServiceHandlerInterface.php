<?php namespace Litmus\Services;

use Litmus\Entities\Box;

interface LitmusServiceHandlerInterface{
	public function setParams($image_path, Box $box = NULL);
	public function getRgba();
}