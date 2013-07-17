
<p class='alert alert-success'>

	<?php 
		if( $status = Session::get('status') ){
			echo $status;
		}
	?>
		
	
</p>

<p class='errors'>
	
	@if( $errors->has() )
		<ul>
			@foreach( $errors->all('<span class="alert alert-error">:message</span>') as $key=>$value )
				<li>{{ $value }}</li>
			@endforeach
		</ul>
	@endif
</p>