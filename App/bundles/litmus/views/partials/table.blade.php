
<table class="table table-striped">

	<tr>
		@foreach( $header as $head )
		<th>{{ $head }}</th>
		@endforeach
	</tr>
	
	@foreach($rows as $obj)
	<tr>
		@foreach($obj as $prop)
		<td>{{ $prop }}</td>
		@endforeach
	</tr>
	@endforeach
	
</table>