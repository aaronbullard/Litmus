@extends('layouts.scaffold')

@section('main')

<h1>Edit Palette</h1>
{{ Form::model($palette, array('method' => 'PATCH', 'route' => array('palettes.update', $palette->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('palettes.show', 'Cancel', $palette->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
