<?php

use Aaronbullard\Litmus\Exceptions\ValidationException;

abstract class AbstractModel extends \Eloquent{

	public function validate($rules = [])
	{
		$rules = array_merge(static::$rules, $rules);
		$v = Validator::make($this->toArray(), $rules);
		if($v->fails())
		{
			throw new ValidationException($v->messages()->first());
		}
		return $this;
	}

}