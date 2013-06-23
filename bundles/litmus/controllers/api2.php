<?php
/*
class Litmus_Api_Controller extends Base_Controller{
	

	public $restful = true;

	public function get_index(){

		$path 	= path('bundle')."litmus/public/img/PH_scale.jpg" ;

		$img	= imagecreatefromjpeg($path);
		$rgb1 	= imagecolorat($img, 10, 15);
		$rgb2 	= imagecolorat($img, 300, 35);

		$colors1 = imagecolorsforindex($img, $rgb1);
		$colors2 = imagecolorsforindex($img, $rgb2);

		print_r($colors1);

		echo "<br />";

		print_r($colors2);

		echo "<br />";

		echo "Magnitude difference: ".LitmusHandler::difference($colors1, $colors2);



	}

}*/