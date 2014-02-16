@section('table')
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Red</th>
			<th>Green</th>
			<th>Blue</th>
			<th>Alpha</th>
			<th>Palette</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($colors as $color)
			<tr>
				<td>{{{ $color->name }}}</td>
				<td>{{{ $color->red }}}</td>
				<td>{{{ $color->green }}}</td>
				<td>{{{ $color->blue }}}</td>
				<td>{{{ $color->alpha }}}</td>
				<td>{{ link_to_route('palettes.show', $color->palette->title, array($color->palette->id), array('class' => 'btn btn-link')) }}</td>
				<td>{{ link_to_route('palettes.{palettes}.colors.edit', 'Edit', [$color->palette->id, $color->id], array('class' => 'btn btn-info')) }}</td>
				<td>
					{{ Form::open(array('method' => 'DELETE', 'route' => array('palettes.{palettes}.colors.destroy', $color->palette->id, $color->id) )) }}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@show