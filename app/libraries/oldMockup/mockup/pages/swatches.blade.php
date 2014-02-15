<div class="row">
	@foreach( $colors as $key => $color )
	<div class="span3 offset1">
		<p>{{ $color->name }}</p>
		@include('mockup.partials.simpleswatch', array('color' => $color))
	</div>
	@endforeach
</div>