@extends('layouts.scaffold')

@section('main')

<h1>All Colors</h1>

<p>{{ link_to_route('colors.create', 'Add new color') }}</p>

@if ($colors->count())
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
                    <td>{{ link_to_route('colors.edit', 'Edit', array($color->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('colors.destroy', $color->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no colors
@endif

@stop
