<?php

class Color extends Eloquent{
	
	
	public static $timestamps = true;
	
	public static $hidden = array('id', 'alpha', 'hex', 'palette_id', 'created_at', 'updated_at');
	
	public static $rules = array(
								//'name' => 'required',
								//'email' => 'required|email'
							  );
	
	
	public function palette(){
		return $this->belongsTo('Palette');
	}
	
	
	public function account(){
		return $this->belongsTo('User');
	}
	
	
}
