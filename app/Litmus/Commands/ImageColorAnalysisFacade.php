<?php namespace Litmus\Commands;

use Illuminate\Support\Facades\Facade;

class ImageColorAnalysisFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'Litmus\Commands\ImageColorAnalysis';
	}

}