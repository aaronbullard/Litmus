<?php namespace Api\Workers;

use Log;
use Image;
use Litmus;
use Event;
use Illuminate\Queue\Jobs\Job;
use Aaronbullard\Litmus\Entities\Rgba;
use Aaronbullard\Litmus\Services\LitmusService;

class ProcessImage implements WorkerInterface{

	public function fire(Job $job, $data)
	{
		// Stop if over three attempts
		if ($job->attempts() > 3)
		{
			Log::info("Job Delete: ".serialize($job));
			$job->delete();
		}

		// Begin
		try{
			$image 	= Image::find($data['image_id']);
			$corners= $image->getBoundingBox();
			$rgba 	= Litmus::getAverageColor($image->url, $corners[0], $corners[1], $corners[2], $corners[3]);

			//Update Image
			$image->red 	= $rgba->red;
			$image->green 	= $rgba->green;
			$image->blue 	= $rgba->blue;
			$image->alpha 	= $rgba->alpha;
			$image->status  = "done";
			$image->save();

			Event::fire('image.done', [$image]);
		}
		catch(\Exception $e)
		{
			Log::error($e->getMessage());
			$job->release();
		}

		// Success, delete job...
		$job->delete();
	}

}