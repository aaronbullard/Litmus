<?php namespace Api\Entities;

use Illuminate\Support\Contracts\ArrayableInterface;

class Response{

	protected $code;
	protected $data;
	protected $message;

	public static function make(ArrayableInterface $data = NULL, $code = 1, $message = NULL)
	{
		$obj 		= new static;
		$obj->data 	= $data;
		$obj->code 	= $code;
		$obj->message = $message;

		return $obj;
	}

	public function __toString()
	{
		return json_encode([
				'status'	=> [
					'code' 	=> $this->code,
					'status' => $this->code === 1  ? 'OK' : 'ERROR' 
				],
				'data' => $this->data->toArray(),
				'message' => $this->message
			]);
	}
}