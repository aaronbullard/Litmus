<?php namespace Litmus\Tests;

use App;
use URL;
use Litmus\Entities\RemoteImage;

class LitmusTest
{
	protected $litmus;
	protected $image_url;
	protected $image_names = array(
			'white', 'whitescreen',
			'red', 'redscreen',
			'green', 'greenscreen',
			'blue', 'bluescreen'
		);
	protected $image_controls = array(
			'white' => 'whitescreen',
			'red' => 'redscreen',
			'green' => 'greenscreen',
			'blue' => 'bluescreen'
		);
	protected $image_actuals = array(
			'white' => 'white',
			'red' => 'red',
			'green' => 'green',
			'blue' => 'blue'
		);

	function __construct()
	{
		$this->litmus 		= App::make('litmus');
		$this->image_url 	= URL::to('colormatch/image');
	}

	protected function getRgbas($names)
	{
		$rgbas = array();
		
		foreach( $names as $name )
		{
			$url = $this->image_url.'/'.$name.'.jpg';
			$rgbas[$name] = RemoteImage::create($url);
		}

		return $rgbas;
	}

	function getControls()
	{
		return $this->getRgbas($this->image_controls);
	}

	function getActuals()
	{
		return $this->getRgbas($this->image_actuals);
	}
}