
<p class='message'>
	
	@if( isset( $message) )
		{{ $message }}
	@endif
</p>

<p class='errors'>
	
	@if( $errors->has() )
		<ul>
			@foreach( $errors->all('<span class="error">:message</span>') as $key=>$value )
				<li>{{ $value }}</li>
			@endforeach
		</ul>
	@endif
</p>