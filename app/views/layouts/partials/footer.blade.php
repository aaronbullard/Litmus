@include('layouts.partials.logo')

@section('footer')
<div id="footer" class="navbar navbar-fixed-bottom" style="padding-bottom:50px">
	<div class="container muted">
		@yield('logo.tagline')
	</div>
</div>
@show