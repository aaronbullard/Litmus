<?php namespace Litmus\Commands;

use Queue;
use Litmus\Services\LitmusServiceHandlerInterface;
use Litmus\Entities\Box;

class ImageColorAnalysis extends AbstractCommand{
	
	protected $litmus;
	
	public function setColorHandler(LitmusServiceHandlerInterface $litmus)
	{
		$this->litmus = $litmus;
		return $this;
	}

	public function execute()
	{
		// Update image status
		$this->image;
		$this->image->setStatus('processing');
		$this->imageRepo->save($this->image);

		// Get image
		$path = $this->image->getFullPath();

		// Get image analysis
		if( is_null($this->image->parameters) )
		{
			$rgba = $this->litmus->setParams($path)->getRgba();
		}
		else
		{
			$box = Box::makeFromJson($this->image->parameters);
			$rgba = $this->litmus->setParams($path, $box)->getRgba();
		}
			
		
		// Update image
		$this->image->red 	= $rgba->red;
		$this->image->green = $rgba->green;
		$this->image->blue 	= $rgba->blue;
		$this->image->alpha = $rgba->alpha;
		$this->image->setStatus('completed');

		// Save image update
		$this->imageRepo->save($this->image);
	}

}