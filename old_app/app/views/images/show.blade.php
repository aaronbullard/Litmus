@extends('layouts.scaffold')

@section('main')

<h1>Show Image</h1>

<p>{{ link_to_route('images.index', 'Return to all images') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Url</th>
				<th>Parameters</th>
				<th>Red</th>
				<th>Green</th>
				<th>Blue</th>
				<th>Alpha</th>
				<th>Account_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $image->url }}}</td>
					<td>{{{ $image->parameters }}}</td>
					<td>{{{ $image->red }}}</td>
					<td>{{{ $image->green }}}</td>
					<td>{{{ $image->blue }}}</td>
					<td>{{{ $image->alpha }}}</td>
					<td>{{{ $image->account_id }}}</td>
                    <td>{{ link_to_route('images.edit', 'Edit', array($image->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('images.destroy', $image->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
