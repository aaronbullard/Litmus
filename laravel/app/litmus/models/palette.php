<?php

class Palette extends Aware{
	
	
	public static $timestamps = true;
	
	public static $rules = array();
	
	public static $hidden = array('id', 'user_id', 'created_at');
	
	
	public function colors(){
		return $this->has_many('Color');
	}

	
	public function user(){
		return $this->belongs_to('User');
	}
	
}