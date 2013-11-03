@if( Session::get('status') )
	<p class='alert alert-success'>
		{{ Session::get('status') }}
	</p>
@endif

@if( $errors->has() )
	@foreach( $errors->all() as $key=>$value )
		<p class='alert alert-error'>{{ $value }}</p>
	@endforeach
@endif

@if( Session::get('error') )
	<p class='alert alert-error'>
		{{ Session::get('error') }}
	</p>
@endif
