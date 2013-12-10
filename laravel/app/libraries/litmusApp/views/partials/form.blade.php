<div id="image-upload">
	
	@include('litmus::partials.message')
	
	<?php
		$url	= isset( $url )	? $url	: NULL;
		$verb	= isset( $verb )? $verb	: 'POST';
		echo Form::horizontal_open_for_files($url, $verb);

			//echo Form::token();

			foreach($fields as $field){
				
				if( isset($field['values']) ){
					$form	= Form::$field['type']($field['name'], $field['values']);
				}else{
					$attributes = array();
					$attributes['value'] = isset($object) && isset($object->{$field['name']}) ? $object->{$field['name']} : NULL;
					$attributes['value'] = Input::had($field['name']) ? Input::old($field['name']) : $attributes['value'];

					$form	= Form::$field['type']($field['name'], $attributes['value'], $attributes);
					
				}
				
				$label	= Form::label($field['name'], $field['label']);
				echo Form::control_group($label, $form); 
				
			}

			echo Form::actions(array(Button::primary_submit('Submit'), Form::button('Cancel')));
		
		echo Form::close();
	?>

</div>