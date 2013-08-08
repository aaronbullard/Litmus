<div id="image-upload">
	
	@include('mockup::partials.message')
	
	<?php
		$url = isset($url) ? $url : NULL;
		echo Form::horizontal_open_for_files($url, 'POST');

			//echo Form::token();

			foreach($fields as $field){
				
				$attributes = array();
				$attributes['value'] = Input::had($field['name']) ? Input::old($field['name']) : NULL;

				echo Form::control_group(
						Form::label($field['name'], $field['label']),
						Form::$field['type']($field['name'], $attributes['value'], $attributes)
				); 
			}

			echo Form::actions(array(Button::primary_submit('Submit'), Form::button('Cancel')));
		
		echo Form::close();
	?>

</div>