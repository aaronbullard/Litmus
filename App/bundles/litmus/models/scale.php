<?php

class Scale extends Aware{
	
	
	public static $timestamps = true;
	
	
	public function colors(){
		return $this->has_many_and_belongs_to('Color');
	}
	
	
	public function account(){
		return $this->belongs_to('User');
	}
	
}