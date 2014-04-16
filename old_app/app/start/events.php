<?php

Event::listen('image.process', function(Image $image){
	Log::info('image.process | image.id: '.$image->id );
	Queue::push('Api\Workers\ProcessImage', ['image_id' => $image->id]);
});


Event::listen('image.done', function(Image $image){
	Log::info('image.done | image.id: '.$image->id );
});