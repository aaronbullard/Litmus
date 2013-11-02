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
				<th>Hex</th>
				<th>Palette_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($colors as $color)
				<tr>
					<td>{{{ $color->name }}}</td>
					<td>{{{ $color->red }}}</td>
					<td>{{{ $color->green }}}</td>
					<td>{{{ $color->blue }}}</td>
					<td>{{{ $color->hex }}}</td>
					<td>{{{ $color->palette_id }}}</td>
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
