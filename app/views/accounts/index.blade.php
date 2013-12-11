@extends('layouts.scaffold')

@section('main')

<h1>All Accounts</h1>

<p>{{ link_to_route('accounts.create', 'Add new account') }}</p>

@if ($accounts->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Account</th>
				<th>Token</th>
				<th>User_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($accounts as $account)
				<tr>
					<td>{{{ $account->account }}}</td>
					<td>{{{ $account->token }}}</td>
					<td>{{{ $account->user_id }}}</td>
                    <td>{{ link_to_route('accounts.edit', 'Edit', array($account->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('accounts.destroy', $account->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no accounts
@endif

@stop
