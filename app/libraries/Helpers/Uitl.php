<?php namespace Helpers;


abstract class Util{
	
	public static function dump($object, $die = TRUE)
	{
		echo "<pre>";
		print_r($object);
		echo "</pre>";
		echo $die ? die : "<br>";
	}


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
	
	public static function html2rgb($color)
	{
		if ($color[0] == '#')
			$color = substr($color, 1);

		if (strlen($color) == 6)
			list($r, $g, $b) = array($color[0].$color[1],
									 $color[2].$color[3],
									 $color[4].$color[5]);
		elseif (strlen($color) == 3)
			list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
		else
			return false;

		$r = hexdec($r); $g = hexdec($g); $b = hexdec($b);

		return array($r, $g, $b);
	}

	public static function rgb2html($r, $g=-1, $b=-1)
	{
		if (is_array($r) && sizeof($r) == 3)
			list($r, $g, $b) = $r;

		$r = intval($r); $g = intval($g);
		$b = intval($b);

		$r = dechex($r<0?0:($r>255?255:$r));
		$g = dechex($g<0?0:($g>255?255:$g));
		$b = dechex($b<0?0:($b>255?255:$b));

		$color = (strlen($r) < 2?'0':'').$r;
		$color .= (strlen($g) < 2?'0':'').$g;
		$color .= (strlen($b) < 2?'0':'').$b;
		return '#'.$color;
	}

}// end class Util
// end Util.php