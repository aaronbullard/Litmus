<?php

class Palette extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
		'user_id' => 'required'
	);

	public function colors(){
		return $this->hasMany('Color');
	}

	
	public function user(){
		return $this->belongsTo('User');
	}
}