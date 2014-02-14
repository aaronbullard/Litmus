<?php

class Palette extends Eloquent{
	
	
	public static $timestamps = true;
	
	public static $rules = array();
	
	public static $hidden = array('id', 'user_id', 'created_at');
	
	
	public function colors(){
		return $this->hasMany('Color');
	}

	
	public function user(){
		return $this->belongsTo('User');
	}
	
}