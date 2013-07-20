<div id="image-upload">
	
	@include('litmus::partials.message')
	
	<?php 
		echo Form::horizontal_open_for_files('image/sample', 'POST');

			echo Form::token();

			foreach($fields as $field){
				echo Form::control_group(
						Form::label($field['name'], $field['label']),
						Form::$field['type']($field['name'], Input::old($field['name']) )
				); 
			}

			echo Form::actions(array(Button::primary_submit('Submit'), Form::button('Cancel')));
		
		echo Form::close();
	?>

</div>