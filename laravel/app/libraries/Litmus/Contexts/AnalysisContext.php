<?php namespace Litmus\Contexts;

class AnalysisContext extends BaseContext
{
	// Classes
	protected $litmus;

	// Roles
	protected $subject;
	protected $control;


	function __construct(LitmusHandler $litmus)
	{
		$this->litmus  = $litmus;
	}


	function run(SubjectRole $subject, ControlRole $control)
	{
		$this->subject = $subject;
		$this->control = $control;
	}

}