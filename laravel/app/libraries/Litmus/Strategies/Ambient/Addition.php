<?php namespace Litmus\Strategies\Ambient;

use Ambient\Helpers\VectorHelper;

/**
 * NEED TO VERIFY AMBIENT SUBJECT ADJUSTEMENT IS IN CORRECT DIRECTION AND NOT DOUBLE COUNTING.
 */
class Addition extends Ambient implements AmbientInterface
{
	private $nVectors 	= array();
	private $clrs 		= array('red','green','blue');

	protected function apply()
	{
		$vector = new Vector(0,0,0);

		// Aggregate all variances for their respective dimension
		foreach( $this->variances as $variance )
		{
			$vec = $variance->getVector();
			foreach($this->clrs as $x)
			{
				$vector->$x += $vec->$x;
			}
		}

		// set $this->ambient_variance
		$this->ambient_variance = $vector;

		// set ambient adjusted subject
		$this->ambient_adjusted_subject = $this->subject;
		foreach( $this->clrs as $x )
		{
			$this->ambient_adjusted_subject->$x += $this->ambient_variance->$x;
		}
	}
}