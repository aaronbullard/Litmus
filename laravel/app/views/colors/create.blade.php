@extends('layouts.scaffold')

@section('main')

<h1>Create Color</h1>

{{ Form::open(array('route' => 'colors.store')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>

		<li>
			{{ Form::label('red', 'Red:') }}
			{{ Form::text('red') }}
		</li>

		<li>
			{{ Form::label('green', 'Green:') }}
			{{ Form::text('green') }}
		</li>

		<li>
			{{ Form::label('blue', 'Blue:') }}
			{{ Form::text('blue') }}
		</li>

		<li>
			{{ Form::label('alpha', 'Alpha:') }}
			{{ Form::text('alpha') }}
		</li>

		<li>
			{{ Form::label('hex', 'Hex:') }}
			{{ Form::text('hex') }}
		</li>

		<li>
			{{ Form::label('palette_id', 'Palette_id:') }}
			{{ Form::input('number', 'palette_id') }}
		</li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


