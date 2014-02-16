@extends('layouts.scaffold')

@section('main')

<h1>Create Account</h1>

{{ Form::open(array('route' => 'accounts.store')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Account Name:') }}
			{{ Form::text('name') }}
		</li>
<?php /*
		<li>
			{{ Form::label('account', 'Account:') }}
			{{ Form::text('account') }}
		</li>
		<li>
			{{ Form::label('token', 'Token:') }}
			{{ Form::text('token') }}
		</li>
*/ ?>

		<li>
			ADD STRIPE HERE!!!
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


