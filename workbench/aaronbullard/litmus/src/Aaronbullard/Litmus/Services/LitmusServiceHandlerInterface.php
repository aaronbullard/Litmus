<?php namespace Aaronbullard\Litmus\Services;

interface LitmusServiceHandlerInterface{
	public function setParams($image_path, $x1 = 0, $y1 = 0, $x2 = NULL, $y2 = NULL);
	public function getRgba();
}