<?php namespace Litmus\ImageRecognition;

use CatchoomRecognition;

class CatchoomImageRecognition{

	protected $api;
	protected $response;

	public function __construct(CatchoomRecognition $api)
	{
		$this->api = $api;
	}

	public function process($image_url, array $options = array())
	{
		$this->response = $this->api->search($image_url, $options);
		
		return $this;
	}

	public function getBody()
	{
		return $this->response->getBody();
	}

	public function getStatus($job_id){}
	public function findById($job_id){}
}