@include('mobile.partials.left-panel')
@include('mobile.partials.right-panel')

@section('page.header')
<div data-role="header">
	@yield('left-panel.link')
	<h1>My header template</h1>
	@yield('right-panel.link')
</div><!-- /header -->
@stop