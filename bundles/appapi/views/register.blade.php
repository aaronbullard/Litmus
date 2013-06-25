<div id="api-register">
	
	@include('appapi::message')
	
	{{ Form::open('api/register', 'POST') }}

		{{ Form::token() }}

		@foreach($register as $key => $val)
			<p>
				{{ Form::label($key, $val) }}
				{{ Form::text($key, Input::old($key)) }}
			</p>
		@endforeach
		
		{{ Form::submit('Register') }}
		
	{{ Form::close() }}

</div>