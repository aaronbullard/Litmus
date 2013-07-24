@if( Session::get('status'))
	<p class='alert alert-success'>
		{{ Session::get('status') }}
	</p>
@endif

@if( $errors->has() )
<p class='errors'>
	<ul>
		@foreach( $errors->all('<span class="alert alert-error">:message</span>') as $key=>$value )
			<li>{{ $value }}</li>
		@endforeach
	</ul>
</p>
@endif
