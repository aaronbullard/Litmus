<?php namespace Aaronbullard\Litmus\ImageRecognition;

abstract class ImageRecognition{
	public function process($image_url, array $options = array());
	public function getStatus($job_id);
	public function findById($job_id);
}