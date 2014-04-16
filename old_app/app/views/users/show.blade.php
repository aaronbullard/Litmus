@extends('layouts.scaffold')

@section('main')

<h1>Show User</h1>

<p>{{ link_to_route('users.index', 'Return to all users') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Email</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Street</th>
				<th>City</th>
				<th>State</th>
				<th>Zipcode</th>
				<th>Phone</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $user->email }}}</td>
					<td>{{{ $user->firstname }}}</td>
					<td>{{{ $user->lastname }}}</td>
					<td>{{{ $user->street }}}</td>
					<td>{{{ $user->city }}}</td>
					<td>{{{ $user->state }}}</td>
					<td>{{{ $user->zipcode }}}</td>
					<td>{{{ $user->phone }}}</td>
                    <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
