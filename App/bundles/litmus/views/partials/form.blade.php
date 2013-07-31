<div id="image-upload">
	
	@include('mockup::partials.message')
	
	<?php
		echo Form::horizontal_open_for_files($url, 'POST');

			//echo Form::token();

			foreach($fields as $field){
				
				$attributes = array();
				
				$attributes['value'] = is_array(Input::old($field['name']) ) ? Input::old($field['name']) : NULL;
				
				echo Form::control_group(
						Form::label($field['name'], $field['label']),
						Form::$field['type']($field['name'], NULL, $attributes)
						
				); 
			}

			echo Form::actions(array(Button::primary_submit('Submit'), Form::button('Cancel')));
		
		echo Form::close();
	?>

</div>