<?php namespace Api\Workers;

use Illuminate\Queue\Jobs\Job;

interface WorkerInterface{
	public function fire(Job $job, $data);
}