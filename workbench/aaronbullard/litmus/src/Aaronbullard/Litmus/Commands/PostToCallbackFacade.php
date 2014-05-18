<?php namespace Aaronbullard\Litmus\Commands;

/**
 * @see \Illuminate\View\Compilers\BladeCompiler
 */
class PostToCallbackFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'Aaronbullard\Litmus\Commands\PostToCallback';
	}

}