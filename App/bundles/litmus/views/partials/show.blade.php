<div>
	@foreach( $object->to_array() as $key=>$val )
		<div class="row-fluid">
			<blockquote>
				<div class="span2 lead text-right"><strong>{{ ucfirst($key) }}</strong> :</div>
				<div class="offset2 lead"> {{ $val }}</div>
			</blockquote>
		</div>
	@endforeach
</div>