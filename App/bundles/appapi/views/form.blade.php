<div id="api-register">
	
	@include('appapi::message')
	
	{{ Form::horizontal_open(URL::current(), 'POST') }}

		<?php for($a=0; $a < count($form)-2; $a++):
			echo Form::control_group(
					Form::label($form[$a]['name'], $form[$a]['label']),
					Form::text($form[$a]['name'], Input::old($form[$a]['name']) )
			); 
		endfor; ?>
		
			{{ Form::control_group( Form::label(NULL,NULL), Form::submit('Register') ) }}
		
	{{ Form::close() }}

</div>