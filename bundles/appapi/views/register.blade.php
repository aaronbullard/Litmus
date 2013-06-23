<div id="api-register">

	{{ Form::open('api/register', 'POST') }}

		{{ Form::token() }}

		@foreach($register as $key => $val)
			<p>
				{{ Form::label($key, $val) }}
				{{ Form::text($key) }}
			</p>
		@endforeach
		
		{{ Form::submit('Register') }}
		
	{{ Form::close() }}

</div>