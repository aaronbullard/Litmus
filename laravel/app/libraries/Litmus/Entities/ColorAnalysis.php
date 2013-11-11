<?php namespace Litmus\Entities;


class ColorAnalysis
{
	protected $data = array();
	protected $keys = array('color', 'vector', 'magnitude', 'normalized');


	function __set($key, $value)
	{
		// If key is color, is it type Rgba?
		if( !is_a($value, 'Rgba') )
		{
			trigger_error(get_class($this)."::".$key."() must be of type class Rgba", E_USER_ERROR);
		}

		// is the key in the array of keys?
		if( in_array($key, $keys) )
		{
			trigger_error("Cannot set {$key} to ".get_class($this), E_USER_ERROR);	
		}

		$this->data[$key] = $value;
		return $this;	
	}


	function __get($key)
	{
		if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

		return NULL;
	}

}