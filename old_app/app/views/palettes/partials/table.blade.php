@section('table')
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th>Account</th>
			<th>Creator</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($palettes as $palette)
			<tr>
				<td>{{ link_to_route('palettes.{palettes}.colors.index', $palette->title, array($palette->id), array('class' => 'btn btn-link')) }}</td>
				<td>{{{ $palette->description }}}</td>
				<td>{{ link_to_route('accounts.show', $palette->account->name, array($palette->account->id), array('class' => 'btn btn-link')) }}</td>
				<td>{{ link_to_route('users.show', $palette->user->getFullName(), array($palette->user->id), array('class' => 'btn btn-link')) }}</td>
				<td>{{ link_to_route('palettes.edit', 'Edit', array($palette->id), array('class' => 'btn btn-info')) }}</td>
				<td>
					{{ Form::open(array('method' => 'DELETE', 'route' => array('palettes.destroy', $palette->id))) }}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@show