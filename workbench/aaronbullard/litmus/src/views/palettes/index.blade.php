@extends('layouts.scaffold')

@section('main')

<h1>All Palettes</h1>

<p>{{ link_to_route('palettes.create', 'Add new palette') }}</p>

@if ($palettes->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>User</th>
				<th>Colors</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($palettes as $palette)
				<tr>
					<td>{{{ $palette->title }}}</td>
					<td>{{{ $palette->description }}}</td>
					<td>{{{ $palette->user->getFullName() }}}</td>
					<td>{{ link_to_route('palettes.colors', 'colors', array($palette->id), array('class' => 'btn btn-link')) }}</td>
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
@else
	There are no palettes
@endif

@stop
