@extends('layouts.scaffold')

@section('main')

<h1>Edit Image</h1>
{{ Form::model($image, array('method' => 'PATCH', 'route' => array('images.update', $image->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('images.show', 'Cancel', $image->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
