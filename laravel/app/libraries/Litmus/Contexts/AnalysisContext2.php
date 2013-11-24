<?php namespace Litmus\Contexts;

class AnalysisContext extends BaseContext
{
	// Classes
	protected $litmus;

	// Roles
	protected $subject;
	protected $control;
	protected $palette;


	function __construct(LitmusHandler $litmus, SubjectRole $subject, ControlRole $control, PaletteRole $palette)
	{
		$this->litmus  = $litmus;
		$this->subject = $subject;
		$this->control = $control;
		$this->palette = $palette;
	}


	function run(){}

}