@extends('layouts.scaffold')

@section('main')

<h1>Show Palette</h1>

<p>{{ link_to_route('palettes.index', 'Return to all palettes') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
				<th>Description</th>
				<th>User_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $palette->title }}}</td>
					<td>{{{ $palette->description }}}</td>
					<td>{{{ $palette->user_id }}}</td>
                    <td>{{ link_to_route('palettes.edit', 'Edit', array($palette->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('palettes.destroy', $palette->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
