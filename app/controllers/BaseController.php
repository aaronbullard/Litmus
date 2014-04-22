<?php

use Aaronbullard\Api\ApiController;

class BaseController extends ApiController {

	protected $limit;

	public function __construct()
	{
		parent::construct();
		$this->limit = Input::has('limit') ? Input::get('limit') : 100;
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}