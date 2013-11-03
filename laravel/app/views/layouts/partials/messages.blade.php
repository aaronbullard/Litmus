<?php

	$options = array(
		'primary'	=> 'primary',
		'success'	=> 'success',
		'info'		=> 'info',
		//'alert'		=> 'alert',
		'danger'	=> 'danger',
		'error'		=> 'error',
	);

	$options['message']	= 'info';
?>

@foreach($options as $key => $option)
	@if( Session::has($key) )
	<?php //print_r(Session::all());exit; ?>
	<div class="flash alert alert-{{ $option }}">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ ucfirst($key) }}: </strong>{{ Session::get($key) }}
	</div>
	<?php //break;?>
	@endif
@endforeach