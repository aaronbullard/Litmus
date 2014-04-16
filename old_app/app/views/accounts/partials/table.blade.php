@section('table')
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Account</th>
				<th>Token</th>
				<th>Admin</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($accounts as $account)
				<tr>
					<td>{{ $account->name }}</td>
					<td>{{{ $account->account }}}</td>
					<td>{{{ $account->token }}}</td>
					<td>{{ link_to_route('users.show', $account->admin->getFullName(), [$account->admin->id]) }}</td>
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
@show