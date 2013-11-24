<?php namespace Litmus\Entities;


class MagicObject
{
	
	protected $keys 		= array();
	protected $type_casts 	= array();

	protected $data 	= array();


	final protected function __set($key, $value)
	{
		// is the key in the array of keys?
		if( in_array($key, $keys) )
		{
			trigger_error("Cannot set {$key} to ".get_class($this), E_USER_ERROR);	
		}

		// Is the key of the correct type?
		if( $this->isProperType($key, $value) )
		{
			trigger_error(get_class($this)."::".$key." must be of type '{$this->type_casts[$key]}'.", E_USER_ERROR);
		}

		$this->data[$key] = $value;

		return $this;	
	}


	final protected function __get($key)
	{
		if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

		trigger_error(get_class($this)." does not have property: {$key}", E_USER_ERROR);	
	}


	final protected function isProperType($key, $value)
	{
		$type = $this->type_casts[$key];

		return is_a($value, $type);
	}

}