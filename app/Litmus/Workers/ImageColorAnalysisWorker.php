<?php namespace Litmus\Workers;

use Illuminate\Queue\Jobs\Job;
use Litmus\Commands\ImageColorAnalysisFacade as ImageColorAnalysis;

class ImageColorAnalysisWorker{

	public function fire(Job $job, array $data)
	{
		// Process Image
		$command = ImageColorAnalysis::create($data['image_id']);

		$command->execute();

		// End job
		$job->delete();
	}
}