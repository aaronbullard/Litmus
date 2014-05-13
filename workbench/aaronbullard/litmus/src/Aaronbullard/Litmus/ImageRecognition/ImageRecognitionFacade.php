<?php namespace Aaronbullard\Litmus\ImageRecognition;

use Illuminate\Support\Facades\Facade;

class ImageRecognitionFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'imagerecogniztion';
	}

}