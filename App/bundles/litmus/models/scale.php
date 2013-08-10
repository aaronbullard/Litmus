<?php

class Scale extends Aware{
	
	
	public static $timestamps = true;
	
	
	public function colors($select = array('colors.*')){
		
		if( isset($select) ){
			foreach($select as $key => $val){
				$select[$key] = 'colors.'.$val;
			}
		}
		
		return $this->has_many_and_belongs_to('Color')->select( $select );
	}

	
	public function account(){
		return $this->belongs_to('User');
	}
	
}