<!-- Modal -->
@section('modal')
<div id="{{ $id }}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">{{ $header }}</h3>
	</div>
	
	<div class="modal-body">
		<div>{{ $body }}</div>
	</div>
	
	<div class="modal-footer">
		@if( isset($footer) )
			{{ $footer }}
		@else
			{{ Form::open() }}
			@foreach($form as $key => $value)
				{{ Form::hidden($key, $value) }}
			@endforeach
				<button type="submit" class="btn btn-primary">Accept</button>
				<button class="btn btn-link" data-dismiss="modal" aria-hidden="true">Cancel</button>
			{{ Form::close() }}
		@endif
	</div>
	
</div>
@stop