@extends('layouts.scaffold')

@section('main')

<h1>Create Image</h1>

{{ Form::open(array('route' => 'images.store')) }}
	<ul>
        <li>
            {{ Form::label('url', 'Url:') }}
            {{ Form::text('url') }}
        </li>

        <li>
            {{ Form::label('parameters', 'Parameters:') }}
            {{ Form::text('parameters') }}
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
            {{ Form::label('account_id', 'Account_id:') }}
            {{ Form::input('number', 'account_id') }}
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


