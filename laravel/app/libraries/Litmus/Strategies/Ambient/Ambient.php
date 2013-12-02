<?php namespace Litmus\Strategies\Ambient;

use Litmus\Entities\Rgba;

abstract class Ambient implements AmbientInterface
{
	protected $subject;
	protected $rgbas 		= array();
	protected $variances 	= array();
	protected $ambient_variance;
	protected $ambient_adjusted_subject;
	

	final protected function __construct(Rgba $subject, array $rgbas, array $variances)
	{
		$this->subject 		= $subject;
		$this->rgbas 		= $rgbas;
		$this->variances 	= $variances;
		$this->apply();
	}

	final public function create(Rgba $subject, array $rgbas, array $variances)
	{
		$class = get_called_class();
		return new $class($rgbas, $variances);
	}

	abstract protected function apply()
	{
		trigger_error("All child classes must provide an Ambient::apply() method!", E_USER_ERROR);
	}

	final public function getAmbientSubject()
	{
		return $this->ambient_adjusted_subject;
	}

	final public function getAmbientVariance()
	{
		return $this->ambient_variance;
	}
}