<?php

class Color extends Eloquent{
	
	
	public static $timestamps = true;
	
	
	public function scales(){
		return $this->has_many_and_belongs_to('Scale');
	}
	
	
	public function account(){
		return $this->belongs_to('User');
	}
	
}
