<?php

use Aaronbullard\Api\ApiController;

class BaseController extends ApiController {

	protected $limit;

	public function __construct()
	{
		parent::construct();
		$this->limit = Input::has('limit') ? Input::get('limit') : 100;
	}

}