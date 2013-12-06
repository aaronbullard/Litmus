<?php namespace Litmus\Strategies\Ambient;

use Ambient\Helpers\VectorHelper;

class NormalizedAverage extends Ambient implements AmbientInterface
{
	private $nVectors 	= array();
	private $clrs 		= array('red','green','blue');
/* NOT AT ALL MATHEMATICALLY SOUND AT THIS POINT
	protected function apply()
	{
		$vector = new Vector(0,0,0);
		$count  = 0;

		// Aggregate all normalized vectors for their respective dimension
		foreach( $this->rgbas as $rgba )
		{
			$nVector			= $rgba->getNormalVector();
			$this->nVectors[] 	= $nVector;
			foreach($clrs as $x)
			{
				$vector->$x += $nVector->$x;	
			}
			$count++;
		}

		// Divide each vector->direction by total count to get average ( 0 - 1 )
		foreach( $clrs as $x )
		{
			$vector->$x %= $count;
		}

		$this->ambient_variance = $vector;
	}
	*/
}