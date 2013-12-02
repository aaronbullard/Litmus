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

	function __construct()
	{
		$this->litmus 		= App::make('litmus');
		$this->image_url 	= URL::to('colormatch/image');
	}

	function fire()
	{
		$rgba = array();
		
		foreach( $this->image_names as $name )
		{
			$url = $this->image_url.'/'.$name.'.jpg';
			$rgba[$name] = RemoteImage::create($url);
		}

		return $rgba;
	}
}