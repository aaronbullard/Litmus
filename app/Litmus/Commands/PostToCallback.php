<?php namespace Litmus\Commands;

class PostToCallback extends AbstractCommand{
	
	/**
	 * Http request handler
	 * @var HttpHandlerInterface
	 */
	protected $http;

	/**
	 * Set Http request handler during build
	 * @param HttpHandlerInterface $http
	 * @return self
	 */
	public function setHttpHandler(HttpHandlerInterface $http)
	{
		$this->http = $http;
		return $this;
	}

	public function execute()
	{
		// Send post call to clients requested url with image as content
		$callback_url = $this->image->callback;

		$this->http->post($callback_url, [
			'image' => $this->image->toArray()
		]);
	}

}