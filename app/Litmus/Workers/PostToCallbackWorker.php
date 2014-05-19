<?php namespace Litmus\Workers;

use Illuminate\Queue\Jobs\Job;
use Litmus\Commands\PostToCallbackFacade as PostToCallback;

class PostToCallbackWorker{

	public function fire(Job $job, array $data)
	{
		$command = PostToCallback::create($data['image_id']);

		$command->execute();

		// End job
		$job->delete();
	}
}