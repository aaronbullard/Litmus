<div>
@foreach( $object->to_array() as $key=>$val )
	<div class="row-fluid">
		<blockquote>
			<div class="span2 lead text-right"><strong>{{ ucfirst($key) }}</strong> :</div>
			<div class="offset2 lead">{{ !is_array($val) ? $val : Button::primary_link(URL::current()."/".$key, $key) }}&nbsp</div>
		</blockquote>
	</div>
@endforeach
</div>