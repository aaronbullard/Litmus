<?php

class Image extends Eloquent {

	protected $guarded = array('red', 'green', 'blue');
	protected $fillable = ['url', 'parameters'];
	
	public static $rules = array(
		'url' => 'required',
		'parameters' => '',
		'red' => 'between:0,255',
		'green' => 'between:0,255',
		'blue' => 'between:0,255',
		'alpha' => 'between:0,255',
		'account_id' => 'required|exists:accounts,id'
	);

	public function account()
	{
		return $this->belongsTo('Account');
	}
}