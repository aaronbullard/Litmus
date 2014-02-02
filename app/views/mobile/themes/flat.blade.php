@section('styles')
	@parent
	<!-- @{{ HTML::style('assets/lib/jqmobile/flat/demo/css/jquery.mobile.flatui.css') }} -->
	{{ HTML::style('vendor/jqm-flatui/generated/jquery.mobile.flatui.min.css') }}
@stop


@section('page_scripts')
	@parent
	<!-- @{{ HTML::script('assets/lib/jqmobile/flat/demo/js/jquery.mobile-1.4.0-rc.1.js') }} -->
	{{ HTML::script('vendor/jquery-mobile-bower/js/jquery.mobile-1.4.0.min.js') }}
@stop