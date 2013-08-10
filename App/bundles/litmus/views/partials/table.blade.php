<table class="table table-striped table-hover">

	<tr>
		<th>View</th>
		@foreach( $fields as $field )
		<th>{{ ucfirst($field) }}</th>
		@endforeach
	
	</tr>

	@foreach($objects as $obj)
	
	<tr>
		<td><a class="btn btn-link" href="{{ $link_url.'/'.$obj->id }}"><i class="icon icon-eye-open"></i></a></td>
		@foreach($obj->attributes as $prop)
			<td>{{ $prop }}</td>
		@endforeach
	</tr>
	
	@endforeach
	
</table>