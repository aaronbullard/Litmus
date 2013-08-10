<?php

class Color extends Aware{
	
	
	public static $timestamps = true;
	
	
	public static $rules = array(
								//'name' => 'required',
								//'email' => 'required|email'
							  );
	
	
	public function scales(){
		return $this->has_many_and_belongs_to('Scale');
	}
	
	
	public function account(){
		return $this->belongs_to('User');
	}
	
	
}
