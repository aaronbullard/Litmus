@section('right-panel.link')
<a href="#right-panel" data-icon="gear" data-iconpos="notext" data-shadow="false" data-iconshadow="false">Settings</a>
@stop

@section('right-panel')
<div data-role="panel" id="right-panel" data-display="overlay" data-position="right" data-theme="c">
	<ul data-role="listview" data-theme="d"  data-icon="false">
		<li data-icon="delete"><a href="#" data-rel="close">Close</a></li>

		<li data-role="list-divider">Account Settings</li>

		<li data-icon="bars"><a href="{{ URL::to('colormatch/signup') }}" data-transition="slide" data-direction="reverse">Signup</a></li>
		<li data-icon="bars"><a href="{{ URL::to('colormatch/upload') }}" data-transition="slideup">Upload</a></li>
		<li data-icon="bars"><a href="#">Profile</a></li>
		<li data-icon="grid"><a href="#">Palettes</a></li>
		<li data-icon="search"><a href="#">History</a></li>
		<li data-icon="edit"><a href="#">Logout</a></li>
	</ul>
</div><!-- /panel -->
@stop