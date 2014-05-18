<?php namespace Aaronbullard\Litmus\Commands;

use Queue;
use Aaronbullard\Litmus\Services\LitmusService;

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
		$rgba = $this->litmus->setParams($path)->getRgba();
		
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