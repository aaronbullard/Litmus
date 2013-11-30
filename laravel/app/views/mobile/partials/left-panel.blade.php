@section('left-panel.link')
<a href="#left-panel" data-icon="bars" data-iconpos="notext" data-shadow="false" data-iconshadow="false">Menu</a>
@stop

@section('left-panel')
<div data-role="panel" id="left-panel" data-theme="c">
	<ul data-role="listview" data-theme="d">
		<li data-icon="delete"><a href="#" data-rel="close">Close</a></li>
		<li data-role="list-divider">Menu</li>
		<li data-icon="check"><a href="{{ URL::action('MockupMobileController@get_index') }}">File Upload</a></li>
		<li data-icon="grid"><a href="{{ URL::action('MockupMobileController@get_palettes', 4) }}">Palette #4</a></li>
		<li data-icon="grid"><a href="{{ URL::to('palettes') }}" data-prefetch="true">Palettes</a></li>
		<li data-icon="grid"><a href="{{ URL::to('users') }}">Users</a></li>
		<li data-icon="back"><a href="#demo-intro" data-rel="back">Demo intro</a></li>
	</ul>
</div><!-- /panel -->
@stop