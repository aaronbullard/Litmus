<table class="table table-striped table-hover">

	<tr>
		<th>View</th>
		@foreach( $objects[0]->to_array() as $key => $val )
		<th>{{ ucfirst($key) }}</th>
		@endforeach
	
	</tr>

	@foreach($objects as $obj)
	
	<tr>
		<td><a class="btn btn-link" href="{{ URL::current().'/'.$obj->id }}"><i class="icon icon-eye-open"></i></a></td>
		@foreach($obj->to_array() as $key => $val)
			<td>{{ $val }}</td>
		@endforeach
	</tr>
	
	@endforeach
	
</table>