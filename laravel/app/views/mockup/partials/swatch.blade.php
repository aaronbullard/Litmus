@if( !isset($obj) )
<p>No color set for swatch!</p>
@else
<p style="height:150px; width:150px; padding:10px; border-radius: 5px;
   background-color: rgb({{$obj->color->red}},
						{{$obj->color->green}},
						{{$obj->color->blue}});">
	<text>Color: ({{$obj->color->red}},
					{{$obj->color->green}},
					{{$obj->color->blue}})
	</text><br>
	@if( isset($obj->magnitude) && isset($obj->normalized) && isset($obj->color->name) )
	<text>Name: {{ $obj->color->name }}</text><br>
	<text>Magnitude: {{ round($obj->magnitude) }}</text><br>
	<text>Normalized: {{ round($obj->normalized, 3) * 100 }}%</text>
	@endif
</p>
@endif