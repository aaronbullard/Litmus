<?php namespace Litmus\Workers;

use Illuminate\Queue\Jobs\Job;
use Illuminate\Filesystem\Filesystem;

class DeleteImageFileWorker{

	protected $filesystem;

	public function __construct(Filesystem $filesystem)
	{
		$this->filesystem = $filesystem;
	}

	public function fire(Job $job, array $data)
	{
		if( $this->filesystem->exists($data['filepath']) )
		{
			$this->filesystem->delete($data['filepath']);
		}

		// End job
		$job->delete();
	}
}