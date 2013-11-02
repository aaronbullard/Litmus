@extends('layouts.scaffold')

@section('main')

<h1>Edit Account</h1>
{{ Form::model($account, array('method' => 'PATCH', 'route' => array('accounts.update', $account->id))) }}
	<ul>
        <li>
            {{ Form::label('account', 'Account:') }}
            {{ Form::text('account') }}
        </li>

        <li>
            {{ Form::label('token', 'Token:') }}
            {{ Form::text('token') }}
        </li>

        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('accounts.show', 'Cancel', $account->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
