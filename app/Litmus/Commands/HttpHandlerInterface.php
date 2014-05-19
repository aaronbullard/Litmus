<?php namespace Litmus\Commands;

interface HttpHandlerInterface{
	public function post($url, array $options = []);
}