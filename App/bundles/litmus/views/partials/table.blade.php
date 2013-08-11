@if( !empty($objects) )
	<table class="table table-striped table-hover" data-provides="rowlink">

		<tr>
			@foreach( $objects[0]->to_array() as $key => $val )
			<th>{{ ucfirst($key) }}</th>
			@endforeach
		</tr>

		@foreach($objects as $obj)

		<tr style="cursor: pointer;" onClick="window.location.assign('{{ URL::current().'/'.$obj->id }}')">
			@foreach($obj->to_array() as $key => $val)
				<td>{{ $val }}</td>
			@endforeach
		</tr>

		@endforeach

	</table>
@else

	<p class='lead text-center'>There are no records to display.</p>

@endif

