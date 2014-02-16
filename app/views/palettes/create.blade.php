@extends('layouts.scaffold')

@section('main')

<h1>Create Palette</h1>

{{ Form::open(array('route' => 'palettes.store')) }}
	<ul>
		<li>
			{{ Form::label('account', 'Account:') }}
			{{ Form::select('account_id', Auth::user()->accounts->lists('name', 'id')) }}
		</li>

		<li>
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title') }}
		</li>

		<li>
			{{ Form::label('description', 'Description:') }}
			{{ Form::textarea('description') }}
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


