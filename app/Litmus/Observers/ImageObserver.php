<?php namespace Litmus\Observers;

use Image;
use Illuminate\Queue\QueueManager;

class ImageObserver{
	
	protected $queue;

	public function __construct(QueueManager $queue)
	{
		$this->queue = $queue;
	}

	public function updating(Image $image)
	{
		if( $image->isCompleted())
		{
			$this->checkForCallback($image);
			$this->deleteFile($image);	
		}
	}

	protected function checkForCallback(Image $image)
	{
		// Send callback via queue
		if($image->hasCallback()){
			$this->queue->push('Litmus\Workers\PostToCallbackWorker', ['image_id' => $image->id]);
		}
	}

	protected function deleteFile(Image $image)
	{
		$this->queue->push('Litmus\Workers\DeleteImageFileWorker', ['filepath' => $image->getFullPath()]);
	}

}