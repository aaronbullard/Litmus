<?php namespace Mockup;

abstract class Util{
	
	public static function recursiveTree($var){
		if(is_array($var) || is_object($var)){
			$out = '<li>';
			foreach($var as $k => $v){
			  if(is_array($v) || is_object($v)){
				$out .= $k." => <ul>".self::recursiveTree($v)."</ul>";
			  }else{
				$out .= $k." => ".$v."<br>";
			  }
			}
			return $out.'</li>';
		}
		return $var;
	}
	
}// end class Util
// end Util.php