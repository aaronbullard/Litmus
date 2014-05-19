<?php namespace Litmus\Exceptions;

class BaseException extends \Exception{

	 // Redefine the exception so message isn't optional
	public function __construct($message = NULL, $code = 0, \Exception $previous = null) {
		// some code
	
		// make sure everything is assigned properly
		parent::__construct($message, $code, $previous);
	}

}