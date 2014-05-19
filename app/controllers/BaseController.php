<?php

use Aaronbullard\Api\ApiController;

class BaseController extends ApiController {

	protected $limit;

	public function __construct()
	{
		$this->limit = Input::has('limit') ? Input::get('limit') : 100;
	}

	protected function validateOwnership(Eloquent $model)
	{
		// Validate correct resource
		if( $model_id = Request::segment(2) )
		{
			$count = $model->where('id', $model_id)->where('user_id', Auth::id())->count();
			if( $count === 0 )
			{
				return $this->respondNotFound();
			}
		}
	}

}