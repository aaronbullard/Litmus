<?php
//*
View::composer('colormatch::layout', function($view){
	$view->nest('navbar', 'mockup.partials.navbar')
		->with('title', "Image Upload")
		->with('lead', "Upload your sample image for analysis");		
});
//*/