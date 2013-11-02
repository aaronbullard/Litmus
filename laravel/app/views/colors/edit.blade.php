@extends('layouts.scaffold')

@section('main')

<h1>Edit Color</h1>
{{ Form::model($color, array('method' => 'PATCH', 'route' => array('colors.update', $color->id))) }}
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
            {{ Form::label('hex', 'Hex:') }}
            {{ Form::text('hex') }}
        </li>

        <li>
            {{ Form::label('palette_id', 'Palette_id:') }}
            {{ Form::input('number', 'palette_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('colors.show', 'Cancel', $color->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
