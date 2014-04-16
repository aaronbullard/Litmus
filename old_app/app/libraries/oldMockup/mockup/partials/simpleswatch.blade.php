@if( !isset($color) )
<p>No color set for swatch!</p>
@else
<p style="height:150px; width:150px; padding:10px; border-radius: 5px;
   background-color: rgb({{$color->red}},
						{{$color->green}},
						{{$color->blue}});">
</p>
@endif