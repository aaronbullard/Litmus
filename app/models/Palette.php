<?php

class Palette extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
		'user_id' => 'required|exists:users,id'
	);

	public function colors(){
		return $this->hasMany('Color');
	}

	public function account(){
		return $this->belongsTo('Account');
	}

}
