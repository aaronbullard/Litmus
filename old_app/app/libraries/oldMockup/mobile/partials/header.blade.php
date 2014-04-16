@include('mobile.partials.left-panel')
@include('mobile.partials.right-panel')

@section('page.header')
<div data-role="header">
	@yield('left-panel.link')
	<h1>ColorMatch Mobile</h1>
	@yield('right-panel.link')
</div><!-- /header -->
@stop


@section('page_styles')
@parent
<style>
	h1, div[data-role="header"]{ cursor:pointer; }
</style>
@stop